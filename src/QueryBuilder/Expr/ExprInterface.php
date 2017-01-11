<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr;

interface ExprInterface
{
    public function asSOQL(): string;
}
