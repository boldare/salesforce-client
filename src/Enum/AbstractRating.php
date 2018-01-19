<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static $this HOT()
 * @method static $this WARM()
 * @method static $this COLD()
 */
abstract class AbstractRating extends AbstractEnumeration
{
    const HOT = 'Hot';
    const WARM = 'Warm';
    const COLD = 'Cold';
}
