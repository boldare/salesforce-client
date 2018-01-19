<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static $this DIFFERENT()
 * @method static $this ACKNOWLEDGED()
 * @method static $this NOT_FOUND()
 * @method static $this INACTIVE()
 * @method static $this PENDING()
 * @method static $this SELECT_MATCH()
 * @method static $this SKIPPED()
 */
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
