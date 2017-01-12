<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

class NotEquals extends AbstractSingleCompare
{
    public function getComparator(): string
    {
        return '!=';
    }
}
