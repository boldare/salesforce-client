<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\GroupBy;

abstract class AbstractGroupBy
{
    abstract protected function getGroupByPart(): string;

    public function asSOQL(): string
    {
        return $this->getGroupByPart();
    }
}
