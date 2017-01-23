<?php

namespace Xsolve\SalesforceClient\Client;

use Psr\Http\Message\ResponseInterface;
use Xsolve\SalesforceClient\Http\HttpException;
use Xsolve\SalesforceClient\Request\RequestInterface;
use Xsolve\SalesforceClient\Security\Token\TokenInterface;

class SalesforceClient extends AbstractSalesforceClient
{
    const UNAUTHORIZED = 401;
    const PREFIX = 'services/data/';

    /**
     * {@inheritdoc}
     */
    protected function sendRequest(TokenInterface $token, RequestInterface $request): ResponseInterface
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
                ],
            ], $request->getParams())
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function isUnauthorized(HttpException $ex): bool
    {
        return $ex->getCode() === self::UNAUTHORIZED;
    }

    /**
     * {@inheritdoc}
     */
    protected function toArray(ResponseInterface $response): array
    {
        $responseBody = json_decode((string) $response->getBody(), true);

        return !$responseBody ? [] : $responseBody;
    }
}
