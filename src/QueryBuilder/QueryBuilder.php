<?php

namespace Xsolve\SalesforceClient\QueryBuilder;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExpressionFactory;
use Xsolve\SalesforceClient\QueryBuilder\Expr\From\AbstractFrom;
use Xsolve\SalesforceClient\QueryBuilder\Expr\GroupBy\AbstractGroupBy;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Select\AbstractSelect;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Where\AbstractWhere;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Where\CompositeWhere;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Where\Operator;

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

    public function where(AbstractWhere $where): self
    {
        $this->query->setWhere($where);

        return $this;
    }

    public function andWhere(AbstractWhere $where): self
    {
        $this->addOrUpdateWhere($where, Operator::CONJUNCTION());

        return $this;
    }

    public function orWhere(AbstractWhere $where): self
    {
        $this->addOrUpdateWhere($where, Operator::DISJUNCTION());

        return $this;
    }

    public function groupBy(AbstractGroupBy $groupBy): self
    {
        $this->query->setGroupBy($groupBy);

        return $this;
    }

    private function addOrUpdateWhere(AbstractWhere $where, Operator $operator)
    {
        $currentWhere = $this->query->getWhere();

        if (!$currentWhere) {
            $this->query->setWhere($where);
        }

        $this->query->setWhere(new CompositeWhere($currentWhere, $operator, $where));
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
