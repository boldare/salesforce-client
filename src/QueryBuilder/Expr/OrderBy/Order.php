<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\OrderBy;

use Eloquent\Enumeration\AbstractEnumeration;

class Order extends AbstractEnumeration
{
    const ASC = 'ASC';
    const DESC = 'DESC';
}
