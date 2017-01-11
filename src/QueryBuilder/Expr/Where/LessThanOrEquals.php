<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Where;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Visitor\VisiteeInterface;

class LessThanOrEquals extends AbstractCompare implements ExprInterface, VisiteeInterface
{
    public function getComparator(): string
    {
        return '<=';
    }
}
