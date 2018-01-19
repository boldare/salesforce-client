<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\OrderBy;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method self ASC()
 * @method self DESC()
 */
class Order extends AbstractEnumeration
{
    const ASC = 'ASC';
    const DESC = 'DESC';
}
