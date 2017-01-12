<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

class LessThanOrEquals extends AbstractSingleCompare
{
    public function getComparator(): string
    {
        return '<=';
    }
}
