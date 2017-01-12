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
                $key = $value;
                $value = '';
            }

            $array[] = $this->grouping($key, (string) $value);
        }

        return new Select\MultipleGrouping($array);
    }

    public function objectType(AbstractSObjectType $objectType): From\ObjectType
    {
        return new From\ObjectType($objectType);
    }

    public function equals(string $left, string $right): Where\Equals
    {
        return new Where\Equals($left, $right);
    }

    public function greaterThan(string $left, string $right): Where\GreaterThan
    {
        return new Where\GreaterThan($left, $right);
    }

    public function greaterThanOrEquals(string $left, string $right): Where\GreaterThanOrEquals
    {
        return new Where\GreaterThanOrEquals($left, $right);
    }

    public function in(string $left, array $values): Where\In
    {
        return new Where\In($left, $values);
    }

    public function lessThan(string $left, string $right): Where\LessThan
    {
        return new Where\LessThan($left, $right);
    }

    public function lessThanOrEquals(string $left, string $right): Where\LessThanOrEquals
    {
        return new Where\LessThanOrEquals($left, $right);
    }

    public function like(string $left, string $right): Where\Like
    {
        return new Where\Like($left, $right);
    }

    public function notEquals(string $left, string $right): Where\NotEquals
    {
        return new Where\NotEquals($left, $right);
    }

    public function notIn(string $left, array $values): Where\NotIn
    {
        return new Where\NotIn($left, $values);
    }

    public function groupBy(string ...$fields): GroupBy\Simple
    {
        return new GroupBy\Simple($fields);
    }

    public function groupByRollup(string ...$fields): GroupBy\Rollup
    {
        return new GroupBy\Rollup($fields);
    }

    public function groupByCube(string ...$fields): GroupBy\Cube
    {
        return new GroupBy\Cube($fields);
    }
}
