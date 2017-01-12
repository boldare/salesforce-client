<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\GroupBy;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;

abstract class AbstractGroupBy implements ExprInterface
{
    abstract protected function getGroupByPart(): string;

    /**
     * {@inheritdoc}
     */
    public function asSOQL(): string
    {
        return $this->getGroupByPart();
    }
}
