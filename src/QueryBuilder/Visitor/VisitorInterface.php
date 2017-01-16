<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor;

use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\AbstractMultiCompare;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\AbstractSingleCompare;

interface VisitorInterface
{
    public function visitSingleCompare(AbstractSingleCompare $compare);

    public function visitMultiCompare(AbstractMultiCompare $multiCompare);
}
