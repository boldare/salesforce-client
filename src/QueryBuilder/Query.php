<?php

namespace Xsolve\SalesforceClient\QueryBuilder;

use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\AbstractCompare;
use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;
use Xsolve\SalesforceClient\QueryBuilder\Expr\From\AbstractFrom;
use Xsolve\SalesforceClient\QueryBuilder\Expr\GroupBy\AbstractGroupBy;
use Xsolve\SalesforceClient\QueryBuilder\Expr\OrderBy\AbstractOrderBy;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Select\AbstractSelect;
use Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters\ParametersReplacingVisitor;
use Xsolve\SalesforceClient\QueryBuilder\Visitor\VisiteeInterface;
use Xsolve\SalesforceClient\QueryBuilder\Visitor\VisitorInterface;

class Query
{
    /**
     * @var AbstractSelect[]
     */
    private $selects = [];

    /**
     * @var AbstractFrom|null
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

    /**
     * @var AbstractOrderBy|null
     */
    private $orderBy;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var int|null
     */
    private $offset;

    /**
     * @var VisitorInterface[]
     */
    private $visitors;

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
     * @return AbstractCompare|null
     */
    public function getWhere()
    {
        return $this->where;
    }

    /**
     * @return AbstractCompare|null
     */
    public function getHaving()
    {
        return $this->having;
    }

    public function setOrderBy(AbstractOrderBy $orderBy)
    {
        $this->orderBy = $orderBy;
    }

    public function setLimit(int $limit)
    {
        $this->limit = $limit;
    }

    public function setOffset(int $offset)
    {
        $this->offset = $offset;
    }

    public function setParameters(array $parameters)
    {
        $this->visitors[] = new ParametersReplacingVisitor($parameters);
    }

    public function parse(): string
    {
        $this->validate();
        $this->visitQueryParts();

        return $this->parseSelect()
            . $this->parseWhere()
            . $this->parseGroupBy()
            . $this->parseHaving()
            . $this->parseOrderBy()
            . $this->parseLimit()
            . $this->parseOffset();
    }

    private function validate()
    {
        if (empty($this->selects) || null === $this->from) {
            throw new \LogicException('At least SELECT and FROM must be defined');
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
        return array_merge(
            $this->selects,
            [$this->from],
            [$this->where],
            [$this->groupBy],
            [$this->having],
            [$this->orderBy]
        );
    }

    private function parseSelect(): string
    {
        $selects = implode(', ', array_map(
            function (AbstractSelect $select): string {
                return $select->asSOQL();
            },
            $this->selects
        ));

        return sprintf('SELECT %s FROM %s', $selects, $this->from->asSOQL());
    }

    private function parseWhere(): string
    {
        if (!$this->where) {
            return '';
        }

        return sprintf(' WHERE %s', $this->where->asSOQL());
    }

    private function parseGroupBy(): string
    {
        if (!$this->groupBy) {
            return '';
        }

        return sprintf(' GROUP BY %s', $this->groupBy->asSOQL());
    }

    private function parseHaving(): string
    {
        if (!$this->having) {
            return '';
        }

        return sprintf(' HAVING %s', $this->having->asSOQL());
    }

    private function parseOrderBy(): string
    {
        if (!$this->orderBy) {
            return '';
        }

        return sprintf(' ORDER BY %s', $this->orderBy->asSOQL());
    }

    private function parseLimit(): string
    {
        if (!is_int($this->limit)) {
            return '';
        }

        return sprintf(' LIMIT %d', $this->limit);
    }

    private function parseOffset(): string
    {
        if (!is_int($this->offset)) {
            return '';
        }

        return sprintf(' OFFSET %d', $this->offset);
    }
}
