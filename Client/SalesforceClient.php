<?php

namespace Xsolve\SalesforceClient\Client;

use Psr\Http\Message\ResponseInterface;
use Xsolve\SalesforceClient\ {
    Generator\TokenGeneratorInterface,
    Http\ClientInterface,
    Http\HttpException,
    Request\RequestInterface,
    Security\Token\TokenInterface
};

class SalesforceClient
{
    const UNAUTHORIZED = 401;
    const PREFIX = 'services/data/';

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var TokenGeneratorInterface
     */
    protected $tokenManager;

    /**
     * @var string
     */
    protected $version;

    public function __construct(
        ClientInterface $client,
        TokenGeneratorInterface $tokenManager,
        string $version
    ) {
        $this->client = $client;
        $this->tokenManager = $tokenManager;
        $this->version = $version;
    }

    public function doRequest(RequestInterface $request) : array
    {
        $token = $this->tokenManager->getToken();

        try {
            $response = $this->sendRequest($token, $request);
        } catch (HttpException $ex) {
            // Token is expired or invalid - get new and retry
            if ($ex->getCode() !== self::UNAUTHORIZED) {
                throw $ex;
            }

            $response = $this->sendRequest($this->tokenManager->regenerateToken($token), $request);
        }

        $responseBody = json_decode((string) $response->getBody(), true);

        return !$responseBody ? [] : $responseBody;
    }

    protected function sendRequest(TokenInterface $token, RequestInterface $request) : ResponseInterface
    {
        return $this->client->request(
            $request->getMethod(),
            sprintf(
                '%s/%s',
                rtrim($token->getInstanceUrl(), '/'),
                sprintf('%s%s/%s', self::PREFIX, $this->version, ltrim($request->getEndpoint(), '/'))
            ),
            array_merge([
                'headers' => [
                    'authorization' => sprintf('%s %s', $token->getTokenType(), $token->getAccessToken()),
                ]
            ], $request->getParams())
        );
    }
}
