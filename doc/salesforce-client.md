SalesforceClient
===
###Introduction
A basic client for managing objects in Salesforce. You can use it to low level communication with Salesforce, although you need to know how request should look like and what will be returned.

### How to create
```php
use Blablacar\Redis\Client as Redis;
use GuzzleHttp\Client;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Xsolve\SalesforceClient\Client\SalesforceClient;
use Xsolve\SalesforceClient\Enum\SObjectType;
use Xsolve\SalesforceClient\Generator\TokenGenerator;
use Xsolve\SalesforceClient\Security\Authentication\Authenticator;
use Xsolve\SalesforceClient\Security\Authentication\Credentials;
use Xsolve\SalesforceClient\Security\Authentication\Strategy\PasswordGrantRegenerateStrategy;
use Xsolve\SalesforceClient\Storage\BlablacarRedisStorage;

$client = new GuzzleAdapter(new Client([
    'base_uri' => 'https://login.salesforce.com/',
//  'base_uri' => 'https://test.salesforce.com/',  // For sandbox
]));
$credentials = new Credentials(
    'CLIENT_ID',
    'CLIENT_SECRET',
    'password',
    [
        'username' => 'USERNAME', // change to your credentials
        'password' => 'PASSWORD', // change to your credentials
    ]
);

$authenticator = new Authenticator(
    $client,
    [new PasswordGrantRegenerateStrategy()]
);
$tokenGenerator = new TokenGenerator(
    $credentials,
    $authenticator,
    new BlablacarRedisStorage(new Redis())
);

$salesforceClient = new SalesforceClient($client, $tokenGenerator, 'v37.0');
```

### How to use
```php
// Creating new object
$result = $salesforceClient->doRequest(new Create(SObjectType::ACCOUNT(), [
    'Name' => 'New account created with XSolve Client'
]));

// Get whole object
$result = $salesforceClient->doRequest(new Get(SObjectType::ACCOUNT(), 'id'));

// Get only specified fields
$result = $salesforceClient->doRequest(new Get(SObjectType::ACCOUNT(), 'id', ['Name']));

// Update object
$result = $salesforceClient->doRequest(new Update(SObjectType::ACCOUNT(), 'id', ['Name' => 'New name']));

// Delete object
$result = $salesforceClient->doRequest(new Delete(SObjectType::ACCOUNT() 'id'));

// Query
$result = $salesforceClient->doRequest(new Query('SELECT Name FROM Account'));
```
**There is possibility to write custom Request (see: [custom request](custom-request.md)).**

[↑ Table of contents ↑](/doc/README.md)

[→ SObject repository →](sobject-repository.md)
