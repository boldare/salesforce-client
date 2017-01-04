<?php

namespace Xsolve\SalesforceClient\Manager;

use Xsolve\SalesforceClient\ {
    Security\Authentication\AuthenticatorInterface,
    Security\Authentication\Credentials,
    Security\Token\TokenInterface,
    Storage\TokenStorageInterface
};

class TokenManager implements TokenManagerInterface
{
    /**
     * @var CredentialsInterface
     */
    protected $credentials;

    /**
     * @var AuthenticatorInterface
     */
    protected $authenticator;

    /**
     * @var TokenStorageInterface
     */
    protected $tokenStorage;

    /**
     * @param CredentialsInterface $credentials
     * @param AuthenticatorInterface $authenticator
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(
        Credentials $credentials,
        AuthenticatorInterface $authenticator,
        TokenStorageInterface $tokenStorage
    ) {
        $this->credentials = $credentials;
        $this->authenticator = $authenticator;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * {@inheritdoc}
     */
    public function getToken(): TokenInterface
    {
        if ($this->tokenStorage->has()) {
            return $this->tokenStorage->get();
        }

        $token = $this->authenticator->authenticate($this->credentials);
        $this->tokenStorage->save($token);

        return $token;
    }

    /**
     * {@inheritdoc}
     */
    public function regenerateToken(TokenInterface $token): TokenInterface
    {
        $newToken = $this->authenticator->regenerate($this->credentials, $token);
        $this->tokenStorage->save($newToken);

        return $newToken;
    }
}
