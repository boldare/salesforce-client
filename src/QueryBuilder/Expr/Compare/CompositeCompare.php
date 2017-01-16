<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;
use Xsolve\SalesforceClient\QueryBuilder\Visitor\VisiteeInterface;
use Xsolve\SalesforceClient\QueryBuilder\Visitor\VisitorInterface;

class CompositeCompare extends AbstractCompare implements ExprInterface, VisiteeInterface
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

    public function accept(VisitorInterface $visitor)
    {
        if ($this->leftExpr instanceof VisiteeInterface) {
            $this->leftExpr->accept($visitor);
        }

        if ($this->rightExpr instanceof VisiteeInterface) {
            $this->rightExpr->accept($visitor);
        }
    }

    /**
     * Inner expressions will be updated by reference.
     */
    public function update(array $values)
    {
    }
}
