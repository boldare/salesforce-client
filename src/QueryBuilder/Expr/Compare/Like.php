<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

class Like extends AbstractSingleCompare
{
    public function getComparator(): string
    {
        return 'LIKE';
    }
}
