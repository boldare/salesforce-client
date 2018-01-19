<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static $this JSON()
 * @method static $this FORM()
 */
class ContentType extends AbstractEnumeration
{
    const JSON = 'application/json';
    const FORM = 'application/x-www-form-urlencoded';
}
