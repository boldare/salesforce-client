
SObjectRepository
===
### Introduction
This repository providing simple interface, to use of Salesforce objects as PHP classes. You no more need to know how to use object - fields which are not able to update/create will be omitted in the request. More informations how to create your own object you can find [here](custom-sobject.md).
### How to create
```php
use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use Xsolve\SalesforceClient\Serializer\CamelCaseNamingStrategy;

// Important! We are using jms serializer, you need to register annotations
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
$account->setName('New account created with Xsolve Client');
$sobjectManager->create($account);
 // If everything gone properly then account should have ID from Salesforce
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
