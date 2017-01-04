<?php

namespace Xsolve\SalesforceClient\Security\Authentication;

use Xsolve\SalesforceClient\Security\ {
    Authentication\Credentials,
    Token\TokenInterface
};

interface AuthenticatorInterface
{
    /**
     * @param CredentialsInterface $credentials
     *
     * @throws AuthorizationFailedException
     */
    public function authenticate(Credentials $credentials) : TokenInterface;

    /**
     * @param CredentialsInterface $credentials
     * @param TokenInterface $token
     *
     * @throws AuthorizationFailedException
     */
    public function regenerate(Credentials $credentials, TokenInterface $token) : TokenInterface;
}
