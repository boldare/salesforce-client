<?php

namespace Xsolve\SalesforceClient\Request;

use Xsolve\SalesforceClient\Enum\ContentType;
use Xsolve\SalesforceClient\Enum\RequestMethod;

class QueryNext implements RequestInterface
{
    const ENDPOINT = '/query/%s';

    /**
     * @var string
     */
    private $nextResultIdentifier;

    public function __construct(string $nextResultIdentifier)
    {
        $this->nextResultIdentifier = $nextResultIdentifier;
    }

    public function getEndpoint(): string
    {
        return sprintf(self::ENDPOINT, $this->nextResultIdentifier);
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
