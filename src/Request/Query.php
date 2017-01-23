<?php

namespace Xsolve\SalesforceClient\Request;

use Xsolve\SalesforceClient\Enum\ContentType;
use Xsolve\SalesforceClient\Enum\RequestMethod;

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

    public function getMethod(): RequestMethod
    {
        return RequestMethod::GET();
    }

    public function getParams(): array
    {
        return [];
    }

    public function getContentType(): ContentType
    {
        return ContentType::FORM();
    }
}
