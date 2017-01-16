<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Select;

abstract class AbstractSelect
{
    abstract protected function getSelectPart(): string;

    public function asSOQL(): string
    {
        return $this->getSelectPart();
    }
}
