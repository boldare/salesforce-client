<?php

namespace Xsolve\SalesforceClient\Enum;

final class SObject
{
    const ACCOUNT = 'Account';
    const LEAD = 'Lead';

    private function __construct()
    {
    }

    public static function getAvailableSObjects() : array
    {
        return [
            self::ACCOUNT,
            self::LEAD,
        ];
    }
}
