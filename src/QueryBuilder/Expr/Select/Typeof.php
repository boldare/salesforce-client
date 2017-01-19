<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Select;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Select\Typeof\ElseClause;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Select\Typeof\WhenClause;

class Typeof extends AbstractSelect implements ExprInterface
{
    /**
     * @var string
     */
    protected $field;

    /**
     * @var WhenClause[]
     */
    protected $whenClauses;

    /**
     * @var ElseClause|null
     */
    protected $elseClause;

    public function __construct(string $field)
    {
        $this->field = $field;
        $this->whenClauses = [];
    }

    public function when(string $field, Fields $fields): self
    {
        $this->whenClauses[] = new WhenClause($field, $fields);

        return $this;
    }

    public function else(Fields $fields): self
    {
        $this->elseClause = new ElseClause($fields);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getSelectPart(): string
    {
        $result = sprintf('TYPEOF %s%s', $this->field, $this->getWhen());

        if (null === $this->elseClause) {
            return sprintf('%s END', $result);
        }

        return sprintf('%s%s END', $result, $this->elseClause->asSOQL());
    }

    protected function getWhen(): string
    {
        $when = '';

        foreach ($this->whenClauses as $whenClause) {
            $when .= $whenClause->asSOQL();
        }

        return $when;
    }
}
