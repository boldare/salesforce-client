<?php

namespace Xsolve\SalesforceClient\Request\Query;

use Xsolve\SalesforceClient\Request\SalesforceRequestInterface;

abstract class AbstractQuery implements SalesforceRequestInterface
{
    public function getMethod(): string
    {
        return SalesforceRequestInterface::METHOD_GET;
    }

    public function getParams() : array
    {
        return [
            'query' => $this->getQuery(),
        ];
    }

    protected abstract function getQuery() : array;
}
