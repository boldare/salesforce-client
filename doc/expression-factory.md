```php
<?php

// $ex instanceof ExpressionFactory
class ExpressionFactory
{
    // Example: $ex->fields(['Name', 'Id', 'LastName']);
    // Result: Name, Id, LastName
    public function fields(array $fields): Select\Fields;

    // Example: $ex->count('Name');
    // Result: COUNT(Name)
    public function count(string $countedValue = null): Select\Count;

    // $query instanceof QueryBuilder\Query
    // Example: $ex->inner($query);
    // Result: $query will be in SELECT statment between brackets
    public function inner(Query $innerQuery): Select\Inner;

    // Example: $ex->grouping('Name');
    // Result: GROUPING(Name) grp_Name
    // Example: $ex->grouping('Name', 'nameGroup');
    // Result: GROUPING(Name) nameGroup
    public function grouping(string $source, string $target = ''): Select\Grouping;

    // Example: $ex->groupings(['Name', 'Something' => 'sht]);
    // Result: GROUPING(Name) grp_Name, GROUPING(Something) sth
    public function groupings(array $values): Select\MultipleGrouping;

    // Example: $ex->objectType(SObjectType::Account())
    // Result: Account
    public function objectType(AbstractSObjectType $objectType): From\ObjectType;

    // Example: $ex->equals('left', 'right');
    // Result: left = right
    public function equals(string $left, string $right): Compare\Equals;

    // Example: $ex->greaterThan('left', 'right');
    // Result: left > right
    public function greaterThan(string $left, string $right): Compare\GreaterThan;

    // Example: $ex->greaterThanOrEquals('left', 'right');
    // Result: left >= right
    public function greaterThanOrEquals(string $left, string $right): Compare\GreaterThanOrEquals;

    // Example: $ex->in('left', [123, 321, 111]);
    // Result: left IN (123, 321, 111)
    public function in(string $left, array $values): Compare\In;

    // Example: $ex->lessThan('left', 'right');
    // Result: left < right
    public function lessThan(string $left, string $right): Compare\LessThan;

    // Example: $ex->lessThanOrEquals('left', 'right');
    // Result: left <= right
    public function lessThanOrEquals(string $left, string $right): Compare\LessThanOrEquals;

    // Example: $ex->like('left', 'right');
    // Result: left LIKE right
    public function like(string $left, string $right): Compare\Like;

    // Example: $ex->notEquals('left', 'right');
    // Result: left != right
    public function notEquals(string $left, string $right): Compare\NotEquals;

    // Example: $ex->notIn('left', [123, 321, 111]);
    // Result: left NOT IN (123, 321, 111)
    public function notIn(string $left, array $values): Compare\NotIn;

    // Example: $ex->groupBy('Name', 'Rating')
    // Result: Name, Rating
    public function groupBy(string ...$fields): GroupBy\Fields;

    // Example: $ex->groupByRollup('Name', 'Rating');
    // Result: ROLLUP(Name, Rating)
    public function groupByRollup(string ...$fields): GroupBy\Rollup;

    // Example: $ex->groupByCube('Name', 'Rating');
    // Result: CUBE(Name, Rating)
    public function groupByCube(string ...$fields): GroupBy\Cube;

    // Example: $ex->orderBy('NumberOfEmployees');
    // Result: NumberOfEmployees ASC NULLS FIRST
    // Example: $ex->orderBy('NumberOfEmployees', Order::DESC(), Strategy::NULLS_LAST());
    // Result: NumberOfEmployees DESC NULLS LAST
    public function orderBy(array $values, OrderBy\Order $order = null, OrderBy\Strategy $strategy = null): OrderBy\OrderBy;

    // Example: $ex->typeof('ReferenceId')
    //              ->when('Account', $ex->fields(['Id']))
    //              ->when('Lead', $ex->fields(['RecordTypeId']))
    //              ->else($ex->fields(['OwnerId'])
    // Result: TYPEOF ReferenceId WHEN Account THEN Id WHEN Lead THEN RecordTypeId ELSE ownerId END
    public function typeof(string $field): Select\Typeof;
}
```

[↑ Table of contents ↑](doc/README.md)
[← Custom SObject ←](custom-sobject.md)
[→ Query builder →](query-builder.md)
