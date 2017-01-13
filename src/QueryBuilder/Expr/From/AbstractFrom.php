<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\From;

abstract class AbstractFrom
{
    abstract protected function getFromPart(): string;

    public function asSOQL(): string
    {
        return $this->getFromPart();
    }
}
