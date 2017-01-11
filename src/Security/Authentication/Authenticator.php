<?php

namespace Xsolve\SalesforceClient\Security\Authentication;

use Xsolve\SalesforceClient\Http\ClientInterface;
use Xsolve\SalesforceClient\Http\HttpException;
use Xsolve\SalesforceClient\Request\RequestInterface;
use Xsolve\SalesforceClient\Security\Authentication\Strategy\RegenerateStrategyInterface;
use Xsolve\SalesforceClient\Security\Token\Token;
use Xsolve\SalesforceClient\Security\Token\TokenInterface;

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
     * @param ClientInterface               $client
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
    public function authenticate(Credentials $credentials): TokenInterface
    {
        try {
            $response = $this->client->request(RequestInterface::METHOD_POST, self::ENDPOINT, [
                'form_params' => $credentials->getParameters(),
            ])->getBody();
        } catch (HttpException $e) {
            throw new Exception\AuthenticationRequestException('Authentication request failed.', 400, $e);
        }

        $parsedBody = json_decode($response, true);

        if (!$parsedBody) {
            throw new Exception\InvalidAuthenticationResponseException(sprintf('Cannot decode response: %s', $response));
        }

        if (!$this->hasRequiredFields($parsedBody)) {
            throw new Exception\InvalidAuthenticationResponseException(sprintf('Response do not contains required fields: token_type, access_token, instance_url.'));
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
    public function regenerate(Credentials $credentials, TokenInterface $token): TokenInterface
    {
        foreach ($this->regenerateStrategies as $strategy) {
            if ($strategy->supports($credentials, $token)) {
                return $this->authenticate($strategy->getCredentials($credentials, $token));
            }
        }

        throw new Exception\UnsupportedCredentialsException('Strategy not found for given credentials and token.');
    }

    protected function hasRequiredFields(array $array): bool
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
