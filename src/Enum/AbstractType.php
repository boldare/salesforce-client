<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method self PROSPECT()
 * @method self CUSTOMER_DIRECT()
 * @method self CUSTOMER_CHANNEL()
 * @method self CHANNEL_PARTNER_OR_RESELLER()
 * @method self INSTALLATION_PARTNER()
 * @method self TECHNOLOGY_PARTNER()
 * @method self OTHER()
 */
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
