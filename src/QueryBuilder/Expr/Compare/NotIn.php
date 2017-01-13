<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Visitor\VisiteeInterface;

class NotIn extends AbstractMultiCompare implements ExprInterface, VisiteeInterface
{
    public function getComparator(): string
    {
        return 'NOT IN';
    }
}
