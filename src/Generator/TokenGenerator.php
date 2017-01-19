<?php

namespace Xsolve\SalesforceClient\Generator;

use Xsolve\SalesforceClient\Security\Authentication\AuthenticatorInterface;
use Xsolve\SalesforceClient\Security\Authentication\Credentials;
use Xsolve\SalesforceClient\Security\Token\TokenInterface;
use Xsolve\SalesforceClient\Storage\TokenStorageInterface;

class TokenGenerator implements TokenGeneratorInterface
{
    /**
     * @var Credentials
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
     * @param Credentials            $credentials
     * @param AuthenticatorInterface $authenticator
     * @param TokenStorageInterface  $tokenStorage
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
