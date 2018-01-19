<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static $this LEAD()
 * @method static $this ACCOUNT()
 * @method static $this PRODUCT()
 * @method static $this CONTRACT()
 * @method static $this ORDER()
 * @method static $this PRICEBOOK()
 * @method static $this PRICEBOOK_ENTRY()
 * @method static $this OPPORTUNITY()
 * @method static $this CONTACT()
 * @method static $this CASE_SO()
 * @method static $this SOLUTION()
 */
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
    const CASE_SO = 'Case';
    const SOLUTION = 'Solution';
}
