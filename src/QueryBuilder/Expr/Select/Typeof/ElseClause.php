<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Select\Typeof;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Select\Fields;

class ElseClause implements ExprInterface
{
    /**
     * @var Fields
     */
    protected $fields;

    public function __construct(Fields $fields)
    {
        $this->fields = $fields;
    }

    /**
     * {@inheritdoc}
     */
    public function asSOQL(): string
    {
        return sprintf(' ELSE %s', $this->fields->asSOQL());
    }
}
