<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Where;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;

class CompositeWhere implements ExprInterface
{
    /**
     * @var AbstractWhere
     */
    private $leftExpr;

    /**
     * @var Operator
     */
    private $operator;

    /**
     * @var AbstractWhere
     */
    private $rightExpr;

    public function __construct(AbstractWhere $leftExpr, Operator $operator, AbstractWhere $rightExpr)
    {
        $this->leftExpr = $leftExpr;
        $this->operator = $operator;
        $this->rightExpr = $rightExpr;
    }

    public function asSOQL(): string
    {
        return sprintf(
            'WHERE %s %s %s',
            $this->leftExpr->asSOQL(),
            $this->operator->value(),
            $this->rightExpr->asSOQL()
        );
    }
}
