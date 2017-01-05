```
use Xsolve\SalesforceClient\ {
    Client\SalesforceClient,
    Http\GuzzleClient,
    Manager\SObjectManager,
    Manager\TokenManager,
    Model\Account,
    Request\Create,
    Security\Authentication\ArrayCredentials,
    Security\Authentication\Authenticator,
    Security\Authentication\Strategy\PasswordGrantRegenerateStrategy,
    Serializer\CamelCaseNamingStrategy,
    Storage\RedisTokenStorage
};
use GuzzleHttp\Client;
use Blablacar\Redis\Client as RedisClient;
use JMS\Serializer\SerializerBuilder;

        $client = new GuzzleClient(new Client());
        $credentials = new ArrayCredentials([
            'grant_type' => 'password',
            'client_id' => 'CLIENT_ID',
            'client_secret' => 'CLIENT_SECRET',
            'username' => 'USERNAME',
            'password' => 'PASSWORD',
        ]);

        $tokenManager = new TokenManager($credentials, $authenticator,  new RedisTokenStorage(new RedisClient('127.0.0.1', 6379)));
        $authenticator = new Authenticator($client, [new PasswordGrantRegenerateStrategy()]);
        $salesforceClient = new SalesforceClient($client, $tokenManager, 'v37.0');

        // Example requests:
        $salesforceClient->doRequest(new Create('Account', ['Name' => 'New account created with Xsolve Client'])

        // Sobject Manager
        $sObjectManager = new SObjectManager(
            $salesforceClient,
            SerializerBuilder::create()->setPropertyNamingStrategy(new CamelCaseNamingStrategy())->build()
        );

        $account = $sObjectManager->get(Account::class, '0010Y00000AcoTA');

        $account->setName('New Name');

        $sObjectManager->update($account);
```
