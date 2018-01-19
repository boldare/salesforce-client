<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static $this PROSPECT()
 * @method static $this CUSTOMER_DIRECT()
 * @method static $this CUSTOMER_CHANNEL()
 * @method static $this CHANNEL_PARTNER_OR_RESELLER()
 * @method static $this INSTALLATION_PARTNER()
 * @method static $this TECHNOLOGY_PARTNER()
 * @method static $this OTHER()
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
