<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method self OWNERSHIP_PUBLIC()
 * @method self OWNERSHIP_PRIVATE()
 * @method self OWNERSHIP_SUBSIDIARY()
 * @method self OWNERSHIP_OTHER()
 */
abstract class AbstractOwnership extends AbstractEnumeration
{
    const OWNERSHIP_PUBLIC = 'Public';
    const OWNERSHIP_PRIVATE = 'Private';
    const OWNERSHIP_SUBSIDIARY = 'Subsidiary';
    const OWNERSHIP_OTHER = 'Other';
}
