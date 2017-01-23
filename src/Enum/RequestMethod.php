<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

class RequestMethod extends AbstractEnumeration
{
    const GET = 'GET';
    const POST = 'POST';
    const PATCH = 'PATCH';
    const DELETE = 'DELETE';
}
