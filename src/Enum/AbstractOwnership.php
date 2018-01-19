<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static $this OWNERSHIP_PUBLIC()
 * @method static $this OWNERSHIP_PRIVATE()
 * @method static $this OWNERSHIP_SUBSIDIARY()
 * @method static $this OWNERSHIP_OTHER()
 */
abstract class AbstractOwnership extends AbstractEnumeration
{
    const OWNERSHIP_PUBLIC = 'Public';
    const OWNERSHIP_PRIVATE = 'Private';
    const OWNERSHIP_SUBSIDIARY = 'Subsidiary';
    const OWNERSHIP_OTHER = 'Other';
}
