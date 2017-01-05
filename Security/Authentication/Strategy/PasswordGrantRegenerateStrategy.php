<?php

namespace Xsolve\SalesforceClient\Security\Authentication\Strategy;

use Xsolve\SalesforceClient\Security\ {
    Authentication\Credentials,
    Token\TokenInterface
};

class PasswordGrantRegenerateStrategy implements RegenerateStrategyInterface
{
    public function getCredentials(Credentials $credentials, TokenInterface $token): Credentials
    {
        return $credentials;
    }

    public function support(Credentials $credentials, TokenInterface $token): bool
    {
        return 'password' === $credentials->getGrantType();
    }
}
