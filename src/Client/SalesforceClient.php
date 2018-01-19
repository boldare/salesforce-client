<?php

namespace Xsolve\SalesforceClient\Client;

use GuzzleHttp\Psr7\Request;
use Http\Client\Exception\HttpException;
use Http\Client\HttpClient;
use Psr\Http\Message\ResponseInterface;
use Xsolve\SalesforceClient\Enum\ContentType;
use Xsolve\SalesforceClient\Generator\TokenGeneratorInterface;
use Xsolve\SalesforceClient\Request\RequestInterface;
use Xsolve\SalesforceClient\Security\Token\TokenInterface;

class SalesforceClient
{
    const UNAUTHORIZED = 401;
    const PREFIX = 'services/data/';

    /**
     * @var HttpClient
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
        HttpClient $client,
        TokenGeneratorInterface $tokenManager,
        string $version
    ) {
        $this->client = $client;
        $this->tokenManager = $tokenManager;
        $this->version = $version;
    }

    public function doRequest(RequestInterface $request): array
    {
        $token = $this->tokenManager->getToken();

        try {
            $response = $this->sendRequest($token, $request);
        } catch (HttpException $ex) {
            // Token is expired or invalid - get new and retry
            if (self::UNAUTHORIZED !== $ex->getCode()) {
                throw $ex;
            }

            $response = $this->sendRequest($this->tokenManager->regenerateToken($token), $request);
        }

        $responseBody = json_decode((string) $response->getBody(), true);

        return !$responseBody ? [] : $responseBody;
    }

    protected function sendRequest(TokenInterface $token, RequestInterface $request): ResponseInterface
    {
        return $this->client->sendRequest(new Request(
                $request->getMethod()->value(),
                $this->getUri($token, $request),
                $this->getHeaders($token, $request),
                $this->parseParams($request->getParams(), $request->getContentType())
            )
        );
    }

    protected function getHeaders(TokenInterface $token, RequestInterface $request): array
    {
        return [
            'authorization' => sprintf('%s %s', $token->getTokenType(), $token->getAccessToken()),
            'Content-type' => $request->getContentType()->value(),
        ];
    }

    protected function getUri(TokenInterface $token, RequestInterface $request): string
    {
        return sprintf(
            '%s/%s',
            rtrim($token->getInstanceUrl(), '/'),
            sprintf('%s%s/%s', self::PREFIX, $this->version, ltrim($request->getEndpoint(), '/'))
        );
    }

    protected function parseParams(array $params, ContentType $contentType): string
    {
        if ((string) $contentType === (string) ContentType::FORM()) {
            return http_build_query($params);
        }

        return json_encode($params);
    }
}
