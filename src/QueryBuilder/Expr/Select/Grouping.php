<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Select;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;

class Grouping extends AbstractSelect implements ExprInterface
{
    /**
     * @var string
     */
    protected $fieldName;

    /**
     * @var string
     */
    protected $targetName;

    public function __construct(string $fieldName, string $targetName)
    {
        $this->fieldName = $fieldName;
        $this->targetName = $targetName;
    }

    /**
     * {@inheritdoc}
     */
    protected function getSelectPart(): string
    {
        return sprintf('GROUPING(%s) %s', $this->fieldName, $this->targetName);
    }
}
