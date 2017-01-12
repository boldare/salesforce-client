<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\OrderBy;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;

class OrderBy extends AbstractOrderBy implements ExprInterface
{
    /**
     * @var array
     */
    private $fields;

    /**
     * @var Order
     */
    private $order;

    /**
     * @var Strategy
     */
    private $strategy;

    public function __construct(
        array $fields,
        Order $order = null,
        Strategy $strategy = null
    ) {
        $this->fields = $fields;
        $this->order = null === $order ? Order::ASC() : $order;
        $this->strategy = null === $strategy ? Strategy::NULLS_FIRST() : $strategy;
    }

    /**
     * {@inheritdoc}
     */
    protected function getFields(): array
    {
        return $this->fields;
    }

    /**
     * {@inheritdoc}
     */
    protected function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * {@inheritdoc}
     */
    protected function getStrategy(): Strategy
    {
        return $this->strategy;
    }
}
