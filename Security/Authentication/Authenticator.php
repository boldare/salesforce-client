<?php

namespace Xsolve\SalesforceClient\Security\Authentication;

use Xsolve\SalesforceClient\ {
    Http\ClientInterface,
    Http\HttpException,
    Request\SalesforceRequestInterface,
    Security\Authentication\Strategy\NotFoundException,
    Security\Authentication\Strategy\RegenerateStrategyInterface,
    Security\Token\Token,
    Security\Token\TokenInterface
};

class Authenticator implements AuthenticatorInterface
{
    const ENDPOINT = 'https://login.salesforce.com/services/oauth2/token';

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var RegenerateStrategyInterface[]
     */
    protected $regenerateStrategies;

    /**
     * @param ClientInterface $client
     * @param RegenerateStrategyInterface[] $regenerateStrategies
     */
    public function __construct(ClientInterface $client, array $regenerateStrategies = [])
    {
        $this->client = $client;
        $this->regenerateStrategies = $regenerateStrategies;
    }

    /**
     * {@inheritdoc}
     */
    public function authenticate(CredentialsInterface $credentials) : TokenInterface
    {
        try {
            $response = $this->client->request(SalesforceRequestInterface::METHOD_POST, self::ENDPOINT, [
                'form_params' => $credentials->getCredentials()
            ])->getBody();
        } catch (HttpException $e) {
            throw new AuthorizationFailedException('Authentication request failed.', 400, $e);
        }

        $parsedBody = json_decode($response, true);

        if (!$parsedBody) {
            throw new AuthorizationFailedException(sprintf('Cannot decode response: %s', $response));
        }

        if (!$this->hasRequiredFields($parsedBody)) {
            throw new AuthorizationFailedException(sprintf('Response do not contains required fields: token_type, access_token, instance_url.'));
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
        foreach ($this->regenerateStrategies as $strategy) {
            if ($strategy->support($credentials, $token)) {
                return $this->authenticate($strategy->getCredentials($credentials, $token));
            }
        }

        throw new NotFoundException('Strategy not found for given credentials and token.', 404);
    }

    protected function hasRequiredFields(array $array) : bool
    {
        if (!isset($array['token_type'])) {
            return false;
        }

        if (!isset($array['access_token'])) {
            return false;
        }

        if (!isset($array['instance_url'])) {
            return false;
        }

        return true;
    }
}
