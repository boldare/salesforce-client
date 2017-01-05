<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

abstract class AbstractStatus extends AbstractEnumeration
{
    const DIFFERENT = 'Different';
    const ACKNOWLEDGED = 'Acknowledged';
    const NOT_FOUND = 'NotFound';
    const INACTIVE = 'Inactive';
    const PENDING = 'Pending';
    const SELECT_MATCH = 'SelectMatch';
    const SKIPPED = 'Skipped';
}
