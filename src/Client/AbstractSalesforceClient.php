<?php

namespace Xsolve\SalesforceClient\Client;

use Psr\Http\Message\ResponseInterface;
use Xsolve\SalesforceClient\Generator\TokenGeneratorInterface;
use Xsolve\SalesforceClient\Http\ClientInterface;
use Xsolve\SalesforceClient\Http\HttpException;
use Xsolve\SalesforceClient\Request\RequestInterface;
use Xsolve\SalesforceClient\Security\Token\TokenInterface;

abstract class AbstractSalesforceClient
{
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

    public function doRequest(RequestInterface $request): array
    {
        $token = $this->tokenManager->getToken();

        try {
            $response = $this->sendRequest($token, $request);
        } catch (HttpException $ex) {
            // Token is expired or invalid - get new and retry
            if (!$this->isUnauthorized($ex)) {
                throw $ex;
            }

            $response = $this->sendRequest($this->tokenManager->regenerateToken($token), $request);
        }

        return $this->toArray($response);
    }

    abstract protected function sendRequest(TokenInterface $token, RequestInterface $request): ResponseInterface;

    abstract protected function isUnauthorized(HttpException $ex): bool;

    abstract protected function toArray(ResponseInterface $response): array;
}
