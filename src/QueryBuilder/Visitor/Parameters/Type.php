<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method self STRING()
 * @method self INT()
 * @method self DATETIME()
 * @method self FLOAT()
 * @method self BOOL()
 */
class Type extends AbstractEnumeration
{
    const STRING = 'string';
    const INT = 'int';
    const DATETIME = 'datetime';
    const FLOAT = 'float';
    const BOOL = 'bool';
}
