<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

class CompositeCompare extends AbstractCompare
{
    /**
     * @var AbstractCompare
     */
    private $leftExpr;

    /**
     * @var Operator
     */
    private $operator;

    /**
     * @var AbstractCompare
     */
    private $rightExpr;

    public function __construct(AbstractCompare $leftExpr, Operator $operator, AbstractCompare $rightExpr)
    {
        $this->leftExpr = $leftExpr;
        $this->operator = $operator;
        $this->rightExpr = $rightExpr;
    }

    /**
     * {@inheritdoc}
     */
    public function getComparator(): string
    {
        return $this->operator->value();
    }

    /**
     * {@inheritdoc}
     */
    public function getLeft(): string
    {
        return $this->leftExpr->asSOQL();
    }

    /**
     * {@inheritdoc}
     */
    public function getRight(): string
    {
        return $this->rightExpr->asSOQL();
    }
}
