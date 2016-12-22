<?php

namespace Xsolve\SalesforceClient\Client;

use Exception;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Response;
use Xsolve\SalesforceClient\ {
    Manager\TokenManagerInterface,
    Request\SalesforceRequestInterface,
    Security\Token\TokenInterface
};

class SalesforceClient
{
    const PREFIX = 'services/data/';

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var TokenManagerInterface
     */
    protected $tokenManager;

    /**
     * @var string
     */
    protected $version;

    /**
     * @param Client $client
     * @param TokenManagerInterface $tokenManager
     * @param string $version
     */
    public function __construct(
        Client $client,
        TokenManagerInterface $tokenManager,
        string $version
    ) {
        $this->client = $client;
        $this->tokenManager = $tokenManager;
        $this->version = $version;
    }

    /**
     * @param SalesforceRequestInterface $request
     *
     * @return array
     *
     * @throws Exception
     */
    public function doRequest(SalesforceRequestInterface $request) : array
    {
        $token = $this->tokenManager->getToken();

        try {
            $response = $this->sendRequest($token, $request);
        } catch (\GuzzleHttp\Exception\RequestException $ex) {
            // Token is expired or invalid - get new and retry
            if ($ex->getCode() === Response::HTTP_UNAUTHORIZED) {
                $response = $this->sendRequest($this->tokenManager->regenerateToken($token), $request);
            }

            if ($ex->getCode() !== Response::HTTP_UNAUTHORIZED) {
                throw $ex;
            }
        }

        if (!$this->statusIsOK($response->getStatusCode())) {
            throw new Exception('Still wrong');
        }

        $responseBody = json_decode((string) $response->getBody(), true);

        return is_null($responseBody) ? [] : $responseBody;
    }

    /**
     *
     * @param TokenInterface $token
     * @param SalesforceRequestInterface $request
     *
     * @return ResponseInterface
     */
    protected function sendRequest(TokenInterface $token, SalesforceRequestInterface $request) : ResponseInterface
    {
        return $this->client->request(
            $request->getMethod(),
            sprintf('%s/%s', rtrim($token->getInstanceUrl(), '/'),
            sprintf('%s%s/%s', self::PREFIX, $this->version, ltrim($request->getEndpoint(), '/'))),
            array_merge([
                'headers' => [
                    'authorization' => sprintf('%s %s', $token->getTokenType(), $token->getAccessToken()),
                ]
            ], $request->getParams())
        );
    }

    /**
     * @param int $status
     *
     * @return bool
     */
    protected function statusIsOK(int $status) : bool
    {
        return Response::HTTP_OK <= $status && $status < Response::HTTP_MULTIPLE_CHOICES;
    }
}
