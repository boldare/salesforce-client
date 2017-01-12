<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

class GreaterThanOrEquals extends AbstractSingleCompare
{
    public function getComparator(): string
    {
        return '>=';
    }
}
