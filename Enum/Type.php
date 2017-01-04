<?php

namespace Xsolve\SalesforceClient\Enum;

class Type
{
    const PROSPECT = 'Prospect';
    const CUSTOMER_DIRECT = 'Customer - Direct';
    const CUSTOMER_CHANNEL = 'Customer - Channel';
    const CHANNEL_PARTNER_OR_RESELLER = 'Channel Partner / Reseller';
    const INSTALLATION_PARTNER = 'Installation Partner';
    const TECHNOLOGY_PARTNER = 'Technology Partner';
    const OTHER = 'Other';

    private function __construct()
    {
    }

    public function getTypes() : array
    {
        return [
            self::PROSPECT,
            self::CUSTOMER_DIRECT,
            self::CUSTOMER_CHANNEL,
            self::CHANNEL_PARTNER_OR_RESELLER,
            self::INSTALLATION_PARTNER,
            self::TECHNOLOGY_PARTNER,
            self::OTHER,
        ];
    }
}
