<?php

namespace Xsolve\SalesforceClient\Request;

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

    public function getMethod(): string
    {
        return self::METHOD_GET;
    }

    public function getParams(): string
    {
        return '';
    }

    public function getMediaType(): string
    {
        return self::TYPE_FORM;
    }
}
