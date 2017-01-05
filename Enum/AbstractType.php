<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

abstract class AbstractType extends AbstractEnumeration
{
    const PROSPECT = 'Prospect';
    const CUSTOMER_DIRECT = 'Customer - Direct';
    const CUSTOMER_CHANNEL = 'Customer - Channel';
    const CHANNEL_PARTNER_OR_RESELLER = 'Channel Partner / Reseller';
    const INSTALLATION_PARTNER = 'Installation Partner';
    const TECHNOLOGY_PARTNER = 'Technology Partner';
    const OTHER = 'Other';
}
