<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\GroupBy;

class Simple extends AbstractGroupBy
{
    /**
     * @var array
     */
    protected $fields;

    public function __construct(array $field)
    {
        $this->fields = $field;
    }

    /**
     * {@inheritdoc}
     */
    protected function getGroupByPart(): string
    {
        return implode(',', $this->fields);
    }
}
