<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\OrderBy;

use Eloquent\Enumeration\AbstractEnumeration;

class Strategy extends AbstractEnumeration
{
    const NULLS_FIRST = 'NULLS FIRST';
    const NULLS_LAST = 'NULLS LAST';
}
