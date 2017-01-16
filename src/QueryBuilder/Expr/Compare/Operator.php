<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

use Eloquent\Enumeration\AbstractEnumeration;

class Operator extends AbstractEnumeration
{
    const CONJUNCTION = 'AND';
    const DISJUNCTION = 'OR';
}
