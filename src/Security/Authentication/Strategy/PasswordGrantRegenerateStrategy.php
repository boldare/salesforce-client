<?php

namespace Xsolve\SalesforceClient\Security\Authentication\Strategy;

use Xsolve\SalesforceClient\Security\Authentication\Credentials;
use Xsolve\SalesforceClient\Security\Token\TokenInterface;

class PasswordGrantRegenerateStrategy implements RegenerateStrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function getCredentials(Credentials $credentials, TokenInterface $token): Credentials
    {
        return $credentials;
    }

    /**
     * {@inheritdoc}
     */
    public function supports(Credentials $credentials, TokenInterface $token): bool
    {
        return 'password' === $credentials->getGrantType();
    }
}
