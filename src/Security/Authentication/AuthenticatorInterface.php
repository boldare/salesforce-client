<?php

namespace Xsolve\SalesforceClient\Security\Authentication;

use Xsolve\SalesforceClient\Security\Token\TokenInterface;

interface AuthenticatorInterface
{
    /**
     * @param Credentials $credentials
     *
     * @return TokenInterface
     */
    public function authenticate(Credentials $credentials): TokenInterface;

    /**
     * @param Credentials    $credentials
     * @param TokenInterface $token
     *
     * @return TokenInterface
     *
     * @throws Exception\AuthenticationFailedException
     */
    public function regenerate(Credentials $credentials, TokenInterface $token): TokenInterface;
}
