<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

class NotIn extends AbstractMultiCompare
{
    public function getComparator(): string
    {
        return 'NOT IN';
    }
}
