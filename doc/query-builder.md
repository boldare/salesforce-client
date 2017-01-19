```php
<?php
// $ex instanceof ExpressionFactory
// $qb instanceof QueryBuilder
class QueryBuilder
{
	// Example: $qb->select($ex->fields(['Name']));
	// Example: $qb->select($ex->count('Value'));
	// Example: $qb->select($ex->inner($query));
	// Example: $qb->select($ex->fields(['Name']), $ex->count('Value'));
    public function select(AbstractSelect ...$selects): self;

	// Example: $qb->from($ex->objectType(SObjectType::Account()));
    public function from(AbstractFrom $from): self;

	// Note: Will override WHERE statement
	// Example: $qb->where($qb->in('Name', ['John', 'Bob', '{myName}']);
    public function where(AbstractCompare $where): self;

    // Note: can be used directly, without any ->where() before
    // Note: if $wrapPrevious is set to true, all the previous conditions in the query will be wrapped with brackets
	// Example: $qb->andWhere($qb->in('Name', ['John', 'Bob', '{myName}']);
    public function andWhere(AbstractCompare $where, bool $wrapPrevious = false): self

    // Note: can be used directly, without any ->where() before
    // Note: if $wrapPrevious is set to true, all the previous conditions in the query will be wrapped with brackets
	// Example: $qb->orWhere($qb->in('Name', ['John', 'Bob', '{myName}']);
    public function orWhere(AbstractCompare $where, bool $wrapPrevious = false): self

	// Note: Will override HAVING statement
	// Example: $qb->having($qb->greaterThan('Number', '150');
    public function having(AbstractCompare $having): self;

    // Note: can be used directly, without any ->having() before
    // Note: if $wrapPrevious is set to true, all the previous conditions in the query will be wrapped with brackets
	// Example: $qb->andHaving($qb->greaterThan('Number', '150');
    public function andHaving(AbstractCompare $having, bool $wrapPrevious = false): self

    // Note: can be used directly, without any ->having() before
    // Note: if $wrapPrevious is set to true, all the previous conditions in the query will be wrapped with brackets
	// Example: $qb->orHaving($qb->greaterThan('Number', '150');
    public function orHaving(AbstractCompare $having, bool $wrapPrevious = false): self

	// Example: $qb->groupBy($ex->groupBy('Name', 'Company'));
	// Example: $qb->groupBy($ex->groupByCube('Name', 'Company'));
    public function groupBy(AbstractGroupBy $groupBy): self;

	// Example: $qb->orderBy($ex->orderBy('Id');
    public function orderBy(AbstractOrderBy $orderBy): self;

	// Example: $qb->limit(10);
    public function limit(int $limit): self;

	// Example: $qb->offset(20);
    public function offset(int $offset): self;

	// Example: $qb->setParameters(['myName' => 'Paul']);
    // Example: $qb->setParameters([
    //     'myIntegerValue' => [
    //         'value' => 123,
    //         'type' => Type::INT(),
    //     ],
    //     'myDatetimeValue' => [
    //         'value' => 1484820051, // you can use \DateTimeInterface instances, timestamps or any strings you could construct a \DateTime instance with
    //         'type' => Type::DATETIME(),
    //     ],
    //     'myFloatValue' => [
    //         'value' => 123.456,
    //         'type' => Type::FLOAT(),
    //     ],
    //     'myBoolValue' => [
    //         'value' => 1,
    //         'type' => Type::BOOL(),
    //     ],
    //     'myStringValue' => [
    //         'value' => 'some value',
    //         'type' => Type::STRING(), // by default all values are treated as strings
    //     ],
    // ]);
    // Note: check Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters\Type enum for available parameter types
    public function setParameters(array $parameters): self;
}
```
[↑ Table of contents ↑](doc/README.md)

[← Expression factory ←](expression-factory.md)