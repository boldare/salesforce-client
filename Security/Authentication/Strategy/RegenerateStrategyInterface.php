<?php

namespace Xsolve\SalesforceClient\Security\Authentication\Strategy;

use Xsolve\SalesforceClient\Security\ {
    Authentication\CredentialsInterface,
    Token\TokenInterface
};

interface RegenerateStrategyInterface
{
    public function getCredentials(CredentialsInterface $credentials, TokenInterface $token) : CredentialsInterface;

    public function support(CredentialsInterface $credentials, TokenInterface $token) : bool;
}
