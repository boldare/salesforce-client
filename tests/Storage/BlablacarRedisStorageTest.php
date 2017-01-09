<?php

namespace Xsolve\SalesforceClient\Storage;

use Blablacar\Redis\Test\Client;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;

class BlablacarRedisStorageTest extends TestCase
{
    /**
     * @var BlablacarRedisStorage
     */
    private $storage;

    /**
     * @var ObjectProphecy|Client
     */
    private $client;

    /**
     * @var string
     */
    private $key = 'test key';

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        if (!class_exists('Blablacar\Redis\Client')) {
            $this->markTestSkipped('blablaca/redis-client must be present in order to run the tests');
        }

        $this->client = $this->prophesize(Client::class);
        $this->storage = new BlablacarRedisStorage($this->client->reveal(), $this->key);
    }

    public function testGet()
    {
        $token = new DummyToken();
        $this->client->get($this->key)->willReturn(serialize($token));
        $this->assertEquals($token, $this->storage->get());
    }

    /**
     * @expectedException \LogicException
     */
    public function testGetNoEntry()
    {
        $this->client->get($this->key)->willReturn(null);
        $this->storage->get();
    }

    /**
     * @dataProvider booleanProvider
     */
    public function testHas(bool $value)
    {
        $this->client->exists($this->key)->willReturn($value);
        $this->assertSame($value, $this->storage->has());
    }

    public function testSave()
    {
        $token = new DummyToken();
        $this->client->set($this->key, serialize($token))->shouldBeCalled();
        $this->storage->save($token);
    }

    /**
     * @return array
     */
    public function booleanProvider()
    {
        return [
            [true],
            [false],
        ];
    }
}
