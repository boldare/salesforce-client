<?php

namespace Xsolve\SalesforceClient\Security\Authentication;

use PHPUnit\Framework\TestCase;

class CredentialsTest extends TestCase
{
    public function testGetParameters()
    {
        $credentials = new Credentials('test client id', 'test client secret', 'test grant type', [
            'test_extra_param' => 'test value',
            'client_id' => 'overriden client id',
            'client_secret' => 'overriden client secret',
            'grant_type' => 'overriden grant type',
        ]);

        $this->assertSame([
            'client_id' => 'test client id',
            'client_secret' => 'test client secret',
            'grant_type' => 'test grant type',
            'test_extra_param' => 'test value',
        ], $credentials->getParameters());
    }
}
