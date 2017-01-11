<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Where;

abstract class AbstractWhere
{
    abstract public function getLeft(): string;

    abstract public function getComparator(): string;

    abstract public function getRight(): string;

    public function asSOQL(): string
    {
        return sprintf('%s %s %s', $this->getLeft(), $this->getComparator(), $this->getRight());
    }
}
