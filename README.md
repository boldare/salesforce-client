```
use Xsolve\SalesforceClient\ {
    Client\SalesforceClient,
    Manager\TokenManager,
    Request\Object\Create,
    Security\Authentication\ArrayCredentials,
    Security\Authentication\Authenticator,
    Storage\RedisTokenStorage
};
use GuzzleHttp\Client;
use Blablacar\Redis\Client as RedisClient;


        $client = new Client();
//        $credentials = new ArrayCredentials([
//            'grant_type' => 'password',
//            'client_id' => 'CLIENT_ID',
//            'client_secret' => 'CLIENT_SECRET',
//            'username' => 'USERNAME',
//            'password' => 'PASSWORD',
//        ]);
        $credentials = new ArrayCredentials([
            'grant_type' => 'authorization_code',
            'client_id' => 'CLIENT_ID',
            'client_secret' => 'CLIENT_SECRET',
            'redirect_uri' => 'https://127.0.0.1',
            'code' => 'CODE',

        ]);

        $authenticator = new Authenticator($client);
        $tokenManager = new TokenManager($credentials, $authenticator,  new RedisTokenStorage(new RedisClient('127.0.0.1', 6379)));
        $salesforceClient = new SalesforceClient($client, $tokenManager, 'v37.0');

        // Example requests:
        $salesforceClient->doRequest(new Create('Account', ['Name' => 'New account created with Xsolve Client'])
```
