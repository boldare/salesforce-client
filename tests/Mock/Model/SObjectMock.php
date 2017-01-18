<?php

namespace Xsolve\SalesforceClient\Mock\Model;

use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Model\AbstractSObject;

class SObjectMock extends AbstractSObject
{
    /**
     * @var AbstractSObjectType
     */
    private static $sObjectName;

    public static function getSObjectName(): AbstractSObjectType
    {
        return static::$sObjectName;
    }

    public static function setSObjectName(AbstractSObjectType $sObjectName)
    {
        static::$sObjectName = $sObjectName;
    }
}
