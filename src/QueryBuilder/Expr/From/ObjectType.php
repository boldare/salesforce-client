<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\From;

use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;

class ObjectType extends AbstractFrom implements ExprInterface
{
    /**
     * @var AbstractSObjectType
     */
    private $objectType;

    /**
     * @param AbstractSObjectType $objectType
     */
    public function __construct(AbstractSObjectType $objectType)
    {
        $this->objectType = $objectType;
    }

    protected function getFromPart(): string
    {
        return $this->objectType->value();
    }
}
