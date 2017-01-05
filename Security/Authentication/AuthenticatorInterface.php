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
     * @throws Exception\AuthenticationFailedException
     */
    public function authenticate(Credentials $credentials) : TokenInterface;

    /**
     * @param CredentialsInterface $credentials
     * @param TokenInterface $token
     *
     * @throws Exception\AuthenticationFailedException
     */
    public function regenerate(Credentials $credentials, TokenInterface $token) : TokenInterface;
}
