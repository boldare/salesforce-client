<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\OrderBy;

abstract class AbstractOrderBy
{
    protected abstract function getFields(): array;

    protected abstract function getOrder(): Order;

    protected abstract function getStrategy(): Strategy;

    public function asSOQL(): string
    {
        return sprintf(
            '%s %s %s',
            implode(', ', $this->getFields()),
            $this->getOrder()->value(),
            $this->getStrategy()->value()
        );
    }
}
