<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

use Xsolve\SalesforceClient\QueryBuilder\Expr\Visitor\VisiteeInterface;
use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;

class GreaterThanOrEquals extends AbstractSingleCompare implements ExprInterface, VisiteeInterface
{
    public function getComparator(): string
    {
        return '>=';
    }
}
