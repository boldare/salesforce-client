<?php

namespace Xsolve\SalesforceClient\Enum;

final class Ownership
{
    const OWNERSHIP_PUBLIC = 'Public';
    const OWNERSHIP_PRIVATE = 'Private';
    const OWNERSHIP_SUBSIDIARY = 'Subsidiary';
    const OWNERSHIP_OTHER = 'Other';

    private function __construct()
    {
    }

    public function getOwnerships() : array
    {
        return [
            self::OWNERSHIP_PUBLIC,
            self::OWNERSHIP_PRIVATE,
            self::OWNERSHIP_SUBSIDIARY,
            self::OWNERSHIP_OTHER,
        ];
    }
}