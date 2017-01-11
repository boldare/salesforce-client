<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Where;

use Eloquent\Enumeration\AbstractEnumeration;

class Operator extends AbstractEnumeration
{
    const CONJUNCTION = 'AND';
    const DISJUNCTION = 'OR';
}
