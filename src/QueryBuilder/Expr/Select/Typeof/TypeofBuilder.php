<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Select\Typeof;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExpressionFactory;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Select\Fields;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Select\Typeof;

class TypeofBuilder
{
    /**
     * @var ExpressionFactory
     */
    protected $exprFactory;

    /**
     * @var string
     */
    protected $field;

    /**
     * @var WhenClause[]
     */
    protected $whenClauses;

    /**
     * @var ElseClause
     */
    protected $elseClause;

    public function __construct(ExpressionFactory $exprFactory, string $field)
    {
        $this->exprFactory = $exprFactory;
        $this->field = $field;
        $this->whenClauses = [];
    }

    public function addWhen(string $type, array $fields): self
    {
        return $this->addWhenFields($type, $this->exprFactory->fields($fields));
    }

    public function addWhenFields(string $type, Fields $fields): self
    {
        $this->whenClauses[] = new WhenClause($type, $fields);

        return $this;
    }

    public function setElse(array $fields): self
    {
        return $this->setElseFields($this->exprFactory->fields($fields));
    }

    public function setElseFields(Fields $fields): self
    {
        $this->elseClause = new ElseClause($fields);

        return $this;
    }

    public function build(): Typeof
    {
        if (empty($this->whenClauses)) {
            throw new \RuntimeException('Must be at least one "WHEN".');
        }

        return new Typeof($this->field, $this->whenClauses, $this->elseClause);
    }
}
