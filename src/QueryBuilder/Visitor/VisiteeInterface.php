<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor;

interface VisiteeInterface
{
    public function accept(VisitorInterface $visitor);

    public function update(array $values);
}
