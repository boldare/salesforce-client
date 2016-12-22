<?php

namespace Xsolve\SalesforceClient\Manager;

use Xsolve\SalesforceClient\Security\Token\TokenInterface;

interface TokenManagerInterface
{
    /**
     * @return TokenInterface
     */
    public function getToken() : TokenInterface;

    /**
     * @param TokenInterface $token
     *
     * @return TokenInterface
     */
    public function regenerateToken(TokenInterface $token) : TokenInterface;
}
