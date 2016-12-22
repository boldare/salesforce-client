<?php

namespace Xsolve\SalesforceClient\Security\Authentication;

use Xsolve\SalesforceClient\Security\ {
    Authentication\CredentialsInterface,
    Token\TokenInterface
};

interface AuthenticatorInterface
{
    /**
     * @param CredentialsInterface $credentials
     */
    public function authenticate(CredentialsInterface $credentials) : TokenInterface;

    /**
     * @param CredentialsInterface $credentials
     * @param TokenInterface $token
     */
    public function regenerate(CredentialsInterface $credentials, TokenInterface $token) : TokenInterface;
}
