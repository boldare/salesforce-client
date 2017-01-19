SObjectRepository
===
### Introduction
This repository provides abstraction for Salesforce objects. You don't need to know Salesforce internals and objects structure - fields which are not able to update/create will be omitted in the request. More details how to create your own objects you can find [in dedicated docs section](custom-sobject.md).
### How to create
```php
use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use Xsolve\SalesforceClient\Serializer\CamelCaseNamingStrategy;

// Important! We are using JMS Serializer, you need to register annotations
AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation', __DIR__.'/vendor/jms/serializer/src'
);

$serializer= SerializerBuilder::create()
    ->setPropertyNamingStrategy(
        new SerializedNameAnnotationStrategy(new CamelCaseNamingStrategy())
    )->build();


$sobjectManager = new SObjectRepository(
    $salesforceClient,
    $serializer
);
```

### Usage
```php
use Xsolve\SalesforceClient\Model\Account;

// Create new object
$account = new Account();
$account->setName('New account created with XSolve Client');
$sobjectManager->create($account);
 // If everything went OK then account should get the ID from Salesforce
echo $account->getId();

// Update object
$account->setName('New name');
$sobjectManager->update($account);

// Delete object
$sobjectManager->delete($account);

// Find object
$account = $sobjectManager->find(Account::class, 'id');

// Find values from object
$array = $sobjectManager->getFieldValues(Account::class, 'id', ['Name']);
```

[↑ Table of contents ↑](/doc/README.md)

[← Basic client ←](salesforce-client.md)

[→ QueryBuilder and QueryExecutor →](query-builder-executor.md)
