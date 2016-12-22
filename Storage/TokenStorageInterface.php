<?php

namespace Xsolve\SalesforceClient\Storage;

use Xsolve\SalesforceClient\Security\Token\TokenInterface;

interface TokenStorageInterface
{
    /**
     * @return bool
     */
    public function has() : bool;

    /**
     * @return TokenInterface
     */
    public function get() : TokenInterface;

    /**
     * @param TokenInterface $token
     */
    public function save(TokenInterface $token);
}

