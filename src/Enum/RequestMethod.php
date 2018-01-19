<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static $this GET()
 * @method static $this POST()
 * @method static $this PATCH()
 * @method static $this DELETE()
 */
class RequestMethod extends AbstractEnumeration
{
    const GET = 'GET';
    const POST = 'POST';
    const PATCH = 'PATCH';
    const DELETE = 'DELETE';
}
