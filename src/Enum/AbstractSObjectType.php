<?php

namespace Xsolve\SalesforceClient\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method self LEAD()
 * @method self ACCOUNT()
 * @method self PRODUCT()
 * @method self CONTRACT()
 * @method self ORDER()
 * @method self PRICEBOOK()
 * @method self PRICEBOOK_ENTRY()
 * @method self OPPORTUNITY()
 * @method self CONTACT()
 * @method self CASE_SO()
 * @method self SOLUTION()
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
