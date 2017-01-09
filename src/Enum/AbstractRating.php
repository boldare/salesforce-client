<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

abstract class AbstractRating extends AbstractEnumeration
{
    const HOT = 'Hot';
    const WARM = 'Warm';
    const COLD = 'Cold';
}
