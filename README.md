```
require_once __DIR__.'/vendor/autoload.php';

use Doctrine\Common\Annotations\AnnotationRegistry;
use GuzzleHttp\Client;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;
use Xsolve\SalesforceClient\Client\SalesforceClient;
use Xsolve\SalesforceClient\Enum\SObjectType;
use Xsolve\SalesforceClient\Generator\TokenGenerator;
use Xsolve\SalesforceClient\Http\GuzzleClient;
use Xsolve\SalesforceClient\Model\Account;
use Xsolve\SalesforceClient\Repository\SObjectRepository;
use Xsolve\SalesforceClient\Request\Create;
use Xsolve\SalesforceClient\Security\Authentication\Authenticator;
use Xsolve\SalesforceClient\Security\Authentication\Credentials;
use Xsolve\SalesforceClient\Security\Authentication\Strategy\PasswordGrantRegenerateStrategy;
use Xsolve\SalesforceClient\Serializer\CamelCaseNamingStrategy;
use Xsolve\SalesforceClient\Storage\RequestTokenStorage;

AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__.'/vendor/jms/serializer/src'
);

$client = new GuzzleClient(new Client());
$credentials = new Credentials(
    'CLIENT_ID',
    'CLIENT_SECRET',
    'password',
    [
        'username' => 'USERNAME',
        'password' => 'PASSWORD',
    ]
);

$authenticator = new Authenticator($client, [new PasswordGrantRegenerateStrategy()]);
$tokenGenerator = new TokenGenerator($credentials, $authenticator, new RequestTokenStorage());
$salesforceClient = new SalesforceClient($client, $tokenGenerator, 'v37.0');

$salesforceClient->doRequest(new Create(SObjectType::ACCOUNT(), ['Name' => 'New account created with Xsolve Client']));
$serializer = SerializerBuilder::create()
    ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new CamelCaseNamingStrategy()))
    ->build();
$sObjectRepository = new SObjectRepository($salesforceClient, $serializer);

$account = $sObjectRepository->find(Account::class, '0010Y00000AcoTA');

$account->setName('New Name');

$sObjectRepository->update($account);
```
