<?php

namespace Xsolve\SalesforceClient\Http;

use Psr\Http\Message\ResponseInterface;

interface ClientInterface
{
    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     *
     * @throws HttpException
     */
    public function request(string $method, string $uri = '', array $options = []) : ResponseInterface;
}
