<?php

namespace Xsolve\SalesforceClient\Http;

use Psr\Http\Message\ResponseInterface;

interface ClientInterface
{
    /**
     * @throws HttpException
     */
    public function request(string $method, string $uri = '', array $options = []): ResponseInterface;
}
