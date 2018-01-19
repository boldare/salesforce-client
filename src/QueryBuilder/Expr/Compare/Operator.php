<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static $this CONJUNCTION()
 * @method static $this DISJUNCTION()
 */
class Operator extends AbstractEnumeration
{
    const CONJUNCTION = 'AND';
    const DISJUNCTION = 'OR';
}
