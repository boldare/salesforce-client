<?php

namespace Xsolve\SalesforceClient\Storage;

use PHPUnit\Framework\TestCase;

class RequestTokenStorageTest extends TestCase
{
    /**
     * @var RequestTokenStorage
     */
    private $storage;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->storage = new RequestTokenStorage();
    }

    public function testTheFlow()
    {
        $token = new DummyToken();
        $this->assertFalse($this->storage->has());
        $this->storage->save($token);
        $this->assertTrue($this->storage->has());
        $this->assertSame($token, $this->storage->get());
    }

    /**
     * @expectedException \LogicException
     */
    public function testGetNoEntry()
    {
        $this->storage->get();
    }
}
