<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

class ContentType extends AbstractEnumeration
{
    const JSON = 'application/json';
    const FORM = 'application/x-www-form-urlencoded';
}
