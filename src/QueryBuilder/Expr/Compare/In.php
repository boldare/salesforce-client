<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

class In extends AbstractMultiCompare
{
    public function getComparator(): string
    {
        return 'IN';
    }
}
