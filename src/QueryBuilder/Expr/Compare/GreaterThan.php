<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

class GreaterThan extends AbstractSingleCompare
{
    public function getComparator(): string
    {
        return '>';
    }
}
