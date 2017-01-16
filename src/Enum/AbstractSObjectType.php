<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

abstract class AbstractSObjectType extends AbstractEnumeration
{
    const LEAD = 'Lead';
    const ACCOUNT = 'Account';
    const PRODUCT = 'Product2';
    const CONTRACT = 'Contract';
    const ORDER = 'Order';
    const PRICEBOOK = 'Pricebook2';
    const PRICEBOOK_ENTRY = 'PricebookEntry';
    const OPPORTUNITY = 'Opportunity';
    const CONTACT = 'Contact';
}
