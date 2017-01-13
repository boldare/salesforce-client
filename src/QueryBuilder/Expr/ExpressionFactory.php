<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr;

use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\QueryBuilder\Query;

class ExpressionFactory
{
    public function fields(array $fields): Select\Fields
    {
        return new Select\Fields($fields);
    }

    public function count(string $countedValue = null): Select\Count
    {
        return new Select\Count($countedValue);
    }

    public function inner(Query $innerQuery): Select\Inner
    {
        return new Select\Inner($innerQuery);
    }

    public function grouping(string $source, string $target = ''): Select\Grouping
    {
        if (empty($target)) {
            $target = sprintf('grp_%s', $source);
        }

        return new Select\Grouping($source, $target);
    }

    public function groupings(array $values): Select\MultipleGrouping
    {
        $array = [];

        foreach ($values as $key => $value) {
            if (is_int($key)) {
                $array[] = $this->grouping($value);
                continue;
            }

            $array[] = $this->grouping($key, $value);
        }

        return new Select\MultipleGrouping($array);
    }

    public function objectType(AbstractSObjectType $objectType): From\ObjectType
    {
        return new From\ObjectType($objectType);
    }

    public function equals(string $left, string $right): Compare\Equals
    {
        return new Compare\Equals($left, $right);
    }

    public function greaterThan(string $left, string $right): Compare\GreaterThan
    {
        return new Compare\GreaterThan($left, $right);
    }

    public function greaterThanOrEquals(string $left, string $right): Compare\GreaterThanOrEquals
    {
        return new Compare\GreaterThanOrEquals($left, $right);
    }

    public function in(string $left, array $values): Compare\In
    {
        return new Compare\In($left, $values);
    }

    public function lessThan(string $left, string $right): Compare\LessThan
    {
        return new Compare\LessThan($left, $right);
    }

    public function lessThanOrEquals(string $left, string $right): Compare\LessThanOrEquals
    {
        return new Compare\LessThanOrEquals($left, $right);
    }

    public function like(string $left, string $right): Compare\Like
    {
        return new Compare\Like($left, $right);
    }

    public function notEquals(string $left, string $right): Compare\NotEquals
    {
        return new Compare\NotEquals($left, $right);
    }

    public function notIn(string $left, array $values): Compare\NotIn
    {
        return new Compare\NotIn($left, $values);
    }

    public function groupBy(string ...$fields): GroupBy\Fields
    {
        return new GroupBy\Fields($fields);
    }

    public function groupByRollup(string ...$fields): GroupBy\Rollup
    {
        return new GroupBy\Rollup($fields);
    }

    public function groupByCube(string ...$fields): GroupBy\Cube
    {
        return new GroupBy\Cube($fields);
    }

    public function orderBy(array $values, OrderBy\Order $order = null, OrderBy\Strategy $strategy = null): OrderBy\OrderBy
    {
        return new OrderBy\OrderBy($values, $order, $strategy);
    }

    public function typeof(string $field): Select\Typeof
    {
        return new Select\Typeof($field);
    }
}
