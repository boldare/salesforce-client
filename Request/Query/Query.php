<?php

namespace Xsolve\SalesforceClient\Request\Query;

class Query extends AbstractQuery
{
    const ENDPOINT = '/query/';

    /**
     * @var string
     */
    protected $query;

    public function __construct(string $query)
    {
        $this->query = $query;
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }

    protected function getQuery(): array
    {
        return ['q' => $this->query];
    }
}
