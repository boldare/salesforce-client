<?php

namespace Xsolve\SalesforceClient\Client;

use Psr\Http\Message\ResponseInterface;
use Xsolve\SalesforceClient\Http\HttpException;
use Xsolve\SalesforceClient\Request\RequestInterface;

class SalesforceClientTest extends AbstractSalesforceClientTest
{
    /**
     * @var SalesforceClient
     */
    protected $salesforceClient;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->salesforceClient = new SalesforceClient($this->httpClient, $this->tokenGenerator, 'v00.0');
    }

    public function testExpiredTokenFlow()
    {
        $this->httpClient->expects($this->at(0))->method('request')->will($this->throwException(new HttpException('', SalesforceClient::UNAUTHORIZED)));
        $this->httpClient->expects($this->at(1))->method('request')->willReturn($this->createMock(ResponseInterface::class));

        $response = $this->salesforceClient->doRequest($this->createMock(RequestInterface::class));

        $this->assertInternalType('array', $response);
    }

    /**
     * @expectedException \Xsolve\SalesforceClient\Http\HttpException
     */
    public function testInvalidToken()
    {
        $this->httpClient->expects($this->at(0))->method('request')->will($this->throwException(new HttpException('', 404)));

        $this->salesforceClient->doRequest($this->createMock(RequestInterface::class));
    }

    public function testValidToken()
    {
        $response = $this->salesforceClient->doRequest($this->createMock(RequestInterface::class));

        $this->assertInternalType('array', $response);
    }
}
