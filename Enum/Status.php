<?php

namespace Xsolve\SalesforceClient\Enum;

final class Status
{
    const DIFFERENT = 'Different';
    const ACKNOWLEDGED = 'Acknowledged';
    const NOT_FOUND = 'NotFound';
    const INACTIVE = 'Inactive';
    const PENDING = 'Pending';
    const SELECT_MATCH = 'SelectMatch';
    const SKIPPED = 'Skipped';

    private function __construct()
    {
    }

    public function getStatuses() : array
    {
        return [
            self::DIFFERENT,
            self::ACKNOWLEDGED,
            self::NOT_FOUND,
            self::INACTIVE,
            self::PENDING,
            self::SELECT_MATCH,
            self::SKIPPED,
        ];
    }
}
