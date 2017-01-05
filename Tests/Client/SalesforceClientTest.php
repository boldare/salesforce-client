<?php

namespace Xsolve\SalesforceClient\Tests\Client;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Xsolve\SalesforceClient\ {
    Client\SalesforceClient,
    Http\ClientInterface,
    Http\HttpException,
    Manager\TokenManagerInterface,
    Request\SalesforceRequestInterface,
    Security\Token\TokenInterface
};

class SalesforceClientTest extends TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|ClientInterface
     */
    protected $httpClient;

    /**
     * @var SalesforceClient
     */
    protected $salesforceClient;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $token = $this->createMock(TokenInterface::class);

        $tokenManager = $this->createMock(TokenManagerInterface::class);
        $tokenManager->method('getToken')->willReturn($token);
        $tokenManager->method('regenerateToken')->willReturn($token);

        $this->httpClient = $this->createMock(ClientInterface::class);

        $this->salesforceClient = new SalesforceClient($this->httpClient, $tokenManager, 'v00.0');
    }

    public function testExpiredTokenFlow()
    {
        $this->httpClient->expects($this->at(0))->method('request')->will($this->throwException(new HttpException('', SalesforceClient::UNAUTHORIZED)));
        $this->httpClient->expects($this->at(1))->method('request')->willReturn($this->createMock(ResponseInterface::class));

        $response = $this->salesforceClient->doRequest($this->createMock(SalesforceRequestInterface::class));

        $this->assertInternalType('array', $response);
    }

    /**
     * @expectedException \Xsolve\SalesforceClient\Http\HttpException
     */
    public function testInvalidToken()
    {
        $this->httpClient->expects($this->at(0))->method('request')->will($this->throwException(new HttpException('', 404)));

        $this->salesforceClient->doRequest($this->createMock(SalesforceRequestInterface::class));
    }

    public function testValidToken()
    {
        $response = $this->salesforceClient->doRequest($this->createMock(SalesforceRequestInterface::class));

        $this->assertInternalType('array', $response);
    }
}
