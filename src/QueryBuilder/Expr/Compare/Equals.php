<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

class Equals extends AbstractSingleCompare
{
    public function getComparator(): string
    {
        return '=';
    }
}
