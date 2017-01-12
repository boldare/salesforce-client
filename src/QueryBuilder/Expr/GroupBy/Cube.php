<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\GroupBy;

class Cube extends AbstractGroupBy
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
        return sprintf('CUBE(%s)', implode(',', $this->fields));
    }
}
