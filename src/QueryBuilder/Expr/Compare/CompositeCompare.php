<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;

class CompositeCompare implements ExprInterface
{
    /**
     * @var ExprInterface
     */
    private $leftExpr;

    /**
     * @var Operator
     */
    private $operator;

    /**
     * @var ExprInterface
     */
    private $rightExpr;

    public function __construct(ExprInterface $leftExpr, Operator $operator, ExprInterface $rightExpr)
    {
        $this->leftExpr = $leftExpr;
        $this->operator = $operator;
        $this->rightExpr = $rightExpr;
    }

    public function asSOQL(): string
    {
        return sprintf(
            'Compare %s %s %s',
            $this->leftExpr->asSOQL(),
            $this->operator->value(),
            $this->rightExpr->asSOQL()
        );
    }
}
