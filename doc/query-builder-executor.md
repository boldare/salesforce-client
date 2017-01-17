Query, QueryBuilder and QueryExecutor
===
## Introduction
You can send request using SalesforceClient
```
$result = $salesforceClient->doRequest(new Query('SELECT Name FROM Account'));
```

but then you need to know how to create whole SOQL, check if you received everything etc. Thanks to `QueryBuilder` and `QueryExecutor` this process is much more simpler.
## QueryBuilder
`QueryBuilder` provides simple API to create SOQL query in several steps.

###Example
```php
$e = new ExpressionFactory();

$innerQuery = (new QueryBuilder())
    ->select($e->count())
    ->from($e->objectType(SObjectType::ORDER()))
    ->where($e->in('Status', ['{firstStatus}', '{secondStatus}']))
    ->andWhere($e->notEquals('Id', '{someId}'))
    ->setParameters([
        'firstStatus' => Status::INACTIVE()->value(),
        'secondStatus' => Status::SKIPPED()->value(),
        'someId' => 321,
    ]);
$res = (new QueryBuilder())
    ->select(
        $e->fields(['Id', 'Name']),
        $e->count('Id'),
        $e->inner($innerQuery->getQuery())
    )
    ->from($e->objectType(SObjectType::LEAD()))
    ->where($e->equals('Id', '{leadId}'))
    ->having($e->in('City', ['Warsaw', 'London', 'Paris']))
    ->orHaving($e->like('FirstName', 'Adam'))
    ->groupBy($e->groupBy('Name'))
    ->setParameters(['leadId' => 123])
    ->getQuery();
```

## QueryExecutor
Thanks to this class you will be able easy send and iterate over response.

### How to create and use
Basic implementation of query executor needs only SalesforceClient.
```php
$queryExecutor = new SalesforceQueryExecutor($salesforceClient);

$result = $queryExecutor->getRecords($query);
$nextResult = $queryExecutor->getNextRecords($result);
```

## Rererences
* [Expression factory](expression-factory.md)
* [Query builder](query-builder.md)
