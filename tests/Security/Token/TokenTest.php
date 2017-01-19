<?php

namespace Xsolve\SalesforceClient\Security\Token;

use PHPUnit\Framework\TestCase;

class TokenTest extends TestCase
{
    public function testSerializeUnserialize()
    {
        $token = new Token('test type', 'test access token', 'test url', 'test refresh token');
        $serialized = serialize($token);
        $this->assertEquals($token, unserialize($serialized));
    }
}
