<?php

namespace Xsolve\SalesforceClient\Enum;

class GrantType
{
    const PASSWORD = 'password';
    const AUTHORIZATION_TOKEN = 'authorization_code';
    const REFRESH_TOKEN = 'refresh_token';

    private function __construct()
    {
    }

    /**
     * @return array
     */
    public function getGrantTypes() : array
    {
        return [
            self::PASSWORD,
            self::AUTHORIZATION_TOKEN,
            self::REFRESH_TOKEN,
        ];
    }
}
