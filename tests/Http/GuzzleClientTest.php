<?php

namespace Xsolve\SalesforceClient\Http;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\TransferException;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\ResponseInterface;

class GuzzleClientTest extends TestCase
{
    /**
     * @var GuzzleClient
     */
    private $guzzleClient;

    /**
     * @var ObjectProphecy|ClientInterface
     */
    private $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        if (!class_exists('GuzzleHttp\ClientInterface')) {
            $this->markTestSkipped('GuzzleHttp is not loaded');
        }

        $this->client = $this->prophesize(ClientInterface::class);
        $this->guzzleClient = new GuzzleClient($this->client->reveal());
    }

    public function testRequest()
    {
        $response = $this->prophesize(ResponseInterface::class)->reveal();
        $this->client->request('GET', 'http://www.example.com', ['test options'])->willReturn($response);

        $this->assertSame($response, $this->guzzleClient->request('GET', 'http://www.example.com', ['test options']));
    }

    public function testRequestWithException()
    {
        $guzzleException = $this->prophesize(TransferException::class)->reveal();
        $this->client->request('GET', 'http://www.example.com', ['test options'])->willThrow($guzzleException);

        try {
            $this->guzzleClient->request('GET', 'http://www.example.com', ['test options']);
            $this->fail('Expected HttpException thrown by GuzzleClient');
        } catch (HttpException $e) {
            $this->assertSame($guzzleException, $e->getPrevious());
        }
    }
}
