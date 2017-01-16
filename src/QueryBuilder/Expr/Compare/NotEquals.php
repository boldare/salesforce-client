<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

use Xsolve\SalesforceClient\QueryBuilder\Visitor\VisiteeInterface;
use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;

class NotEquals extends AbstractSingleCompare implements ExprInterface, VisiteeInterface
{
    public function getComparator(): string
    {
        return '!=';
    }
}
