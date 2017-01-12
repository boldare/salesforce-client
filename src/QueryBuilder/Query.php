<?php

namespace Xsolve\SalesforceClient\QueryBuilder;

use LogicException;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\AbstractCompare;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\CompareInterface;
use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;
use Xsolve\SalesforceClient\QueryBuilder\Expr\From\AbstractFrom;
use Xsolve\SalesforceClient\QueryBuilder\Expr\GroupBy\AbstractGroupBy;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Select\AbstractSelect;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Visitor\ParametersReplacingVisitor;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Visitor\VisiteeInterface;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Visitor\VisitorInterface;

class Query
{
    /**
     * @var AbstractSelect[]
     */
    private $selects = [];

    /**
     * @var AbstractFrom
     */
    private $from;

    /**
     * @var AbstractCompare|null
     */
    private $where;

    /**
     * @var AbstractGroupBy|null
     */
    private $groupBy;

    /**
     * @var AbstractCompare|null
     */
    private $having;
//
//    private $orderBy;
//
//    private $limit;
//
//    private $offset;

    /**
     * @var VisitorInterface[]
     */
    private $visitors = [];

    /**
     * @param VisitorInterface[] $visitors
     */
    public function __construct(array $visitors = [])
    {
        $this->visitors = $visitors;
    }

    public function addSelect(AbstractSelect $select)
    {
        $this->selects[] = $select;
    }

    public function setFrom(AbstractFrom $from)
    {
        $this->from = $from;
    }

    public function setWhere(AbstractCompare $where)
    {
        $this->where = $where;
    }

    public function setGroupBy(AbstractGroupBy $groupBy)
    {
        $this->groupBy = $groupBy;
    }

    public function setHaving(AbstractCompare $having)
    {
        $this->having = $having;
    }

    /**
     * @return CompareInterface|null
     */
    public function getWhere()
    {
        return $this->where;
    }

    /**
     * @return CompareInterface|null
     */
    public function getHaving()
    {
        return $this->having;
    }

    public function setParameters(array $parameters)
    {
        $this->visitors[] = new ParametersReplacingVisitor($parameters);
    }

    public function __toString()
    {
        $this->validate();
        $this->visitQueryParts();
        $selects = implode(', ', array_map(
            function (AbstractSelect $select) {
                return $select->asSOQL();
            },
            $this->selects
        ));

        $query = sprintf('SELECT %s FROM %s ', $selects, $this->from->asSOQL());

        if ($this->where) {
            $query .= sprintf('WHERE %s', $this->where->asSOQL());
        }

        if ($this->groupBy) {
            $query .= sprintf(' GROUP BY %s', $this->groupBy->asSOQL());
        }

        if ($this->having) {
            $query .= sprintf(' HAVING %s', $this->having->asSOQL());
        }

        return $query;
    }

    private function validate()
    {
        if (!$this->selects || !$this->from) {
            throw new LogicException('At least SELECT and FROM must be defined');
        }
    }

    private function visitQueryParts()
    {
        foreach ($this->visitors as $visitor) {
            foreach ($this->getQueryParts() as $queryPart) {
                if ($queryPart instanceof VisiteeInterface) {
                    $queryPart->accept($visitor);
                }
            }
        }
    }

    /**
     * @return ExprInterface[]
     */
    private function getQueryParts(): array
    {
        return array_merge($this->selects, [$this->from], [$this->where]);
    }
}
