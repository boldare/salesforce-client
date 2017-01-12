<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\GroupBy;

class Rollup extends AbstractGroupBy
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
        return sprintf('ROLLUP(%s)', implode(',', $this->fields));
    }
}
