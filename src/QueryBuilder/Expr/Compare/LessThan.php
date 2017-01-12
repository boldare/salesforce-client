<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

class LessThan extends AbstractSingleCompare
{
    public function getComparator(): string
    {
        return '<';
    }
}
