<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Visitor;

use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\AbstractSingleCompare;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\AbstractMultiCompare;

interface VisitorInterface
{
    public function visitCompare(AbstractSingleCompare $compare);

    public function visitMultiCompare(AbstractMultiCompare $multiCompare);
}
