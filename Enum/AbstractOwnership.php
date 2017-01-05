<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

abstract class AbstractOwnership extends AbstractEnumeration
{
    const OWNERSHIP_PUBLIC = 'Public';
    const OWNERSHIP_PRIVATE = 'Private';
    const OWNERSHIP_SUBSIDIARY = 'Subsidiary';
    const OWNERSHIP_OTHER = 'Other';
}
