<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\OrderBy;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static $this ASC()
 * @method static $this DESC()
 */
class Order extends AbstractEnumeration
{
    const ASC = 'ASC';
    const DESC = 'DESC';
}
