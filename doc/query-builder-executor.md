Query, QueryBuilder and QueryExecutor
===
## Introduction
You can send "query" request using SalesforceClient
```
$result = $salesforceClient->doRequest(new Query('SELECT Name FROM Account'));
```

but then you need to know how to create whole SOQL, check if you have received everything etc. Thanks to `QueryBuilder` and `QueryExecutor` this process is much simpler.
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
QueryExecutor allows to transfer a query instance to Records and optionally fetch next results if returned query result was trimmed.
Default implementation SalesforceClientQueryExecutor simply uses the Salesforce client to fetch the data. Feel free to create your own implementation of QueryExecutorInterface e.g. to introduce some kind of cache.

### How to create and use
Basic implementation of query executor needs only SalesforceClient.
```php
$queryExecutor = new SalesforceQueryExecutor($salesforceClient);

$records = $queryExecutor->getRecords($query);
$nextResult = $queryExecutor->getNextRecords($records);
```

As the Records class is an implementation of iterator, you can iterate over them in foreach loops:
```php
foreach ($records as $record) {
    var_dump($record);
}
```

## Rererences
* [Expression factory](expression-factory.md)
* [Query builder](query-builder.md)

[↑ Table of contents ↑](doc/README.md)

[← SObject repository ←](sobject-repository.md)

[→ Custom request →](custom-request.md)
