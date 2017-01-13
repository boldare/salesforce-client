<?php

namespace Xsolve\SalesforceClient\Request;

class Query implements RequestInterface
{
    const ENDPOINT = '/query/';

    /**
     * @var string
     */
    private $queryString;

    public function __construct(string $queryString)
    {
        $this->queryString = $queryString;
    }

    public function getEndpoint(): string
    {
        return sprintf(
            '%s?%s',
            self::ENDPOINT,
            http_build_query(['q' => $this->queryString], null, '&')
        );
    }

    public function getMethod(): string
    {
        return self::METHOD_GET;
    }

    public function getParams(): array
    {
        return [];
    }
}
