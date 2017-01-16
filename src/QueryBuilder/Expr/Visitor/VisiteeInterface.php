<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Visitor;

interface VisiteeInterface
{
    public function accept(VisitorInterface $visitor);

    public function update(array $values);
}
