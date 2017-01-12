<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Visitor\VisiteeInterface;

abstract class AbstractCompare implements ExprInterface, VisiteeInterface
{
    abstract public function getLeft(): string;

    abstract public function getComparator(): string;

    abstract public function getRight(): string;

    public function asSOQL(): string
    {
        return sprintf('%s %s %s', $this->getLeft(), $this->getComparator(), $this->getRight());
    }
}
