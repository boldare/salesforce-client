<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method self GET()
 * @method self POST()
 * @method self PATCH()
 * @method self DELETE()
 */
class RequestMethod extends AbstractEnumeration
{
    const GET = 'GET';
    const POST = 'POST';
    const PATCH = 'PATCH';
    const DELETE = 'DELETE';
}
