<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

use Eloquent\Enumeration\AbstractEnumeration;

class Type extends AbstractEnumeration
{
    const STRING = 'string';
    const INT = 'int';
    const DATETIME = 'datetime';
    const FLOAT = 'float';
    const BOOL = 'bool';
}
