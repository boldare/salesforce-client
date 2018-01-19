<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method self HOT()
 * @method self WARM()
 * @method self COLD()
 */
abstract class AbstractRating extends AbstractEnumeration
{
    const HOT = 'Hot';
    const WARM = 'Warm';
    const COLD = 'Cold';
}
