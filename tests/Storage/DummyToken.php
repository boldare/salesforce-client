<?php

namespace Xsolve\SalesforceClient\Storage;

use Xsolve\SalesforceClient\Security\Token\TokenInterface;

class DummyToken implements TokenInterface
{
    public function getAccessToken(): string
    {
        return '';
    }

    public function getInstanceUrl(): string
    {
        return '';
    }

    public function getRefreshToken(): string
    {
        return '';
    }

    public function getTokenType(): string
    {
        return '';
    }

    public function serialize(): string
    {
        return serialize([]);
    }

    public function unserialize($serialized)
    {
    }
}
