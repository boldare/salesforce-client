<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Visitor;

use Xsolve\SalesforceClient\QueryBuilder\Expr\Where\AbstractCompare;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Where\AbstractMultiCompare;

interface VisitorInterface
{
    public function visitCompare(AbstractCompare $compare);

    public function visitMultiCompare(AbstractMultiCompare $multiCompare);
}
