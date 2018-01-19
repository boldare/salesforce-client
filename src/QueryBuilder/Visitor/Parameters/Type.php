<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static $this STRING()
 * @method static $this INT()
 * @method static $this DATETIME()
 * @method static $this FLOAT()
 * @method static $this BOOL()
 */
class Type extends AbstractEnumeration
{
    const STRING = 'string';
    const INT = 'int';
    const DATETIME = 'datetime';
    const FLOAT = 'float';
    const BOOL = 'bool';
}
