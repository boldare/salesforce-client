<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\GroupBy;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;

class Cube extends AbstractGroupBy implements ExprInterface
{
    /**
     * @var array
     */
    protected $fields;

    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    /**
     * {@inheritdoc}
     */
    protected function getGroupByPart(): string
    {
        return sprintf('CUBE(%s)', implode(', ', $this->fields));
    }
}
