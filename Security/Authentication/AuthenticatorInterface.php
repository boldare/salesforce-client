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
     *
     * @throws AuthorizationFailedException
     */
    public function authenticate(CredentialsInterface $credentials) : TokenInterface;

    /**
     * @param CredentialsInterface $credentials
     * @param TokenInterface $token
     *
     * @throws AuthorizationFailedException
     */
    public function regenerate(CredentialsInterface $credentials, TokenInterface $token) : TokenInterface;
}
