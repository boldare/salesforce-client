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
	// Example: $qb->andWhere($qb->in('Name', ['John', 'Bob', '{myName}']);
    public function andWhere(AbstractCompare $where): self;

    // Note: can be used directly, without any ->where() before
	// Example: $qb->orWhere($qb->in('Name', ['John', 'Bob', '{myName}']);
    public function orWhere(AbstractCompare $where): self;

	// Note: Will override HAVING statement
	// Example: $qb->having($qb->greaterThan('Number', '150');
    public function having(AbstractCompare $having): self;

    // Note: can be used directly, without any ->having() before
	// Example: $qb->andHaving($qb->greaterThan('Number', '150');
    public function andHaving(AbstractCompare $having): self;

    // Note: can be used directly, without any ->having() before
	// Example: $qb->orHaving($qb->greaterThan('Number', '150');
    public function orHaving(AbstractCompare $having): self;

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
    public function setParameters(array $parameters): self;
}
```
