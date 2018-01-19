<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\OrderBy;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method self NULLS_FIRST()
 * @method self NULLS_LAST()
 */
class Strategy extends AbstractEnumeration
{
    const NULLS_FIRST = 'NULLS FIRST';
    const NULLS_LAST = 'NULLS LAST';
}
