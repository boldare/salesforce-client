<?php

namespace Xsolve\SalesforceClient\Security\Authentication\Strategy;

use Xsolve\SalesforceClient\Security\ {
    Authentication\CredentialsInterface,
    Token\TokenInterface
};

class PasswordGrantRegenerateStrategy implements RegenerateStrategyInterface
{
    public function getCredentials(CredentialsInterface $credentials, TokenInterface $token): CredentialsInterface
    {
        return $credentials;
    }

    public function support(CredentialsInterface $credentials, TokenInterface $token): bool
    {
        return 'password' === $credentials->getGrantType();
    }
}
