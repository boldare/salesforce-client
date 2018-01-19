<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\OrderBy;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static $this NULLS_FIRST()
 * @method static $this NULLS_LAST()
 */
class Strategy extends AbstractEnumeration
{
    const NULLS_FIRST = 'NULLS FIRST';
    const NULLS_LAST = 'NULLS LAST';
}
