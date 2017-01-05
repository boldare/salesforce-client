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
     * @throws Exception\AuthenticationFailedException
     */
    public function authenticate(CredentialsInterface $credentials) : TokenInterface;

    /**
     * @param CredentialsInterface $credentials
     * @param TokenInterface $token
     *
     * @throws Exception\AuthenticationFailedException
     */
    public function regenerate(CredentialsInterface $credentials, TokenInterface $token) : TokenInterface;
}
