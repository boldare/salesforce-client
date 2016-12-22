<?php

namespace Xsolve\SalesforceClient\Security\Authentication;

use GuzzleHttp\Client;
use Xsolve\SalesforceClient\ {
    Enum\GrantType,
    Security\Token\Token,
    Security\Token\TokenInterface
};

class Authenticator implements AuthenticatorInterface
{
    const ENDPOINT = 'https://login.salesforce.com/services/oauth2/token';

    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function authenticate(CredentialsInterface $credentials) : TokenInterface
    {
        $response = $this->client->post(self::ENDPOINT, [
            'form_params' => $credentials->getCredentials()
        ])->getBody();

        $parsedBody = json_decode($response, true);

        if (!$parsedBody) {
            throw new \Exception('Something went wrong...');
        }

        return new Token(
            $parsedBody['token_type'],
            $parsedBody['access_token'],
            $parsedBody['instance_url'],
            isset($parsedBody['refresh_token']) ? $parsedBody['refresh_token'] : ''
        );
    }

    /**
     * {@inheritdoc}
     */
    public function regenerate(CredentialsInterface $credentials, TokenInterface $token): TokenInterface
    {
        dump('regenerate');
        if ($credentials->getGrantType() !== GrantType::AUTHORIZATION_TOKEN) {
            return $this->authenticate($credentials);
        }

        if (empty($token->getRefreshToken())) {
            return $this->authenticate($credentials);
        }

        dump('regenerate - refresh token');
        return $this->authenticate($this->createRefreshCredentials($credentials, $token));
    }

    /**
     * @param CredentialsInterface $credentials
     * @param TokenInterface $token
     *
     * @return CredentialsInterface
     */
    protected function createRefreshCredentials(CredentialsInterface $credentials, TokenInterface $token)
    {
        return new ArrayCredentials([
            'grant_type' => GrantType::REFRESH_TOKEN,
            'client_id' => $credentials->getClientId(),
            'client_secret' => $credentials->getClientSecret(),
            'refresh_token' => $token->getRefreshToken(),
        ]);
    }
}
