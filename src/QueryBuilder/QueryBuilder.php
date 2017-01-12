<?php

namespace Xsolve\SalesforceClient\QueryBuilder;

use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\AbstractCompare;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\CompareInterface;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\CompositeCompare;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\Operator;
use Xsolve\SalesforceClient\QueryBuilder\Expr\ExpressionFactory;
use Xsolve\SalesforceClient\QueryBuilder\Expr\From\AbstractFrom;
use Xsolve\SalesforceClient\QueryBuilder\Expr\GroupBy\AbstractGroupBy;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Select\AbstractSelect;

class QueryBuilder
{
    /**
     * @var Query
     */
    private $query;

    public function __construct()
    {
        $this->reset();
    }

    public function select(AbstractSelect ...$selects): self
    {
        foreach ($selects as $select) {
            $this->query->addSelect($select);
        }

        return $this;
    }

    public function from(AbstractFrom $from): self
    {
        $this->query->setFrom($from);

        return $this;
    }

    public function where(AbstractCompare $where): self
    {
        $this->query->setWhere($where);

        return $this;
    }

    public function andWhere(AbstractCompare $where): self
    {
        $this->addOrUpdateWhere($where, Operator::CONJUNCTION());

        return $this;
    }

    public function orWhere(AbstractCompare $where): self
    {
        $this->addOrUpdateWhere($where, Operator::DISJUNCTION());

        return $this;
    }

    public function groupBy(AbstractGroupBy $groupBy): self
    {
        $this->query->setGroupBy($groupBy);

        return $this;
    }

    public function having(AbstractCompare $having): self
    {
        $this->query->setHaving($having);

        return $this;
    }

    public function andHaving(AbstractCompare $having): self
    {
        $this->addOrUpdateHaving($having, Operator::CONJUNCTION());

        return $this;
    }

    public function orHaving(AbstractCompare $having): self
    {
        $this->addOrUpdateHaving($having, Operator::DISJUNCTION());

        return $this;
    }

    private function addOrUpdateWhere(AbstractCompare $where, Operator $operator)
    {
        $currentWhere = $this->query->getWhere();

        if (!$currentWhere) {
            $this->query->setWhere($where);

            return;
        }

        $this->query->setWhere(new CompositeCompare($currentWhere, $operator, $where));
    }

    private function addOrUpdateHaving(AbstractCompare $having, Operator $operator)
    {
        $currentHaving = $this->query->getHaving();

        if (!$currentHaving) {
            $this->query->setHaving($having);

            return;
        }

        $this->query->setHaving(new CompositeCompare($currentHaving, $operator, $having));
    }

    public function setParameters(array $parameters): self
    {
        $this->query->setParameters($parameters);

        return $this;
    }

    public function getQuery(): Query
    {
        return $this->query;
    }

    public function getExprFactory(): ExpressionFactory
    {
        return new ExpressionFactory();
    }

    private function reset()
    {
        $this->query = new Query();
    }
}
