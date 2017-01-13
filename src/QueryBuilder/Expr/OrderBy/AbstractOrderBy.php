<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\OrderBy;

abstract class AbstractOrderBy
{
    abstract protected function getFields(): array;

    abstract protected function getOrder(): Order;

    abstract protected function getStrategy(): Strategy;

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
