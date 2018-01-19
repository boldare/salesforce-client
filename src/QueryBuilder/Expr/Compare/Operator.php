<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method self CONJUNCTION()
 * @method self DISJUNCTION()
 */
class Operator extends AbstractEnumeration
{
    const CONJUNCTION = 'AND';
    const DISJUNCTION = 'OR';
}
