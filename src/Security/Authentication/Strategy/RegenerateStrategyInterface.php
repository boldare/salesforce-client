<?php

namespace Xsolve\SalesforceClient\Security\Authentication\Strategy;

use Xsolve\SalesforceClient\Security\Authentication\Credentials;
use Xsolve\SalesforceClient\Security\Token\TokenInterface;

interface RegenerateStrategyInterface
{
    /**
     * Should return credentials which are acceptable by salesforce.
     * For example, change grant type and params if refresh token exists.
     */
    public function getCredentials(Credentials $credentials, TokenInterface $token): Credentials;

    public function supports(Credentials $credentials, TokenInterface $token): bool;
}
