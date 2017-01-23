<?php

namespace Xsolve\SalesforceClient\Client;

use GuzzleHttp\Psr7\Request;
use Http\Client\Exception\HttpException;
use Http\Client\HttpClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Xsolve\SalesforceClient\Generator\TokenGeneratorInterface;
use Xsolve\SalesforceClient\Request\RequestInterface;
use Xsolve\SalesforceClient\Security\Token\TokenInterface;

class SalesforceClientTest extends TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|HttpClient
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

        $tokenManager = $this->createMock(TokenGeneratorInterface::class);
        $tokenManager->method('getToken')->willReturn($token);
        $tokenManager->method('regenerateToken')->willReturn($token);

        $this->httpClient = $this->createMock(HttpClient::class);

        $this->salesforceClient = new SalesforceClient($this->httpClient, $tokenManager, 'v00.0');
    }

    public function testExpiredTokenFlow()
    {
        $this->httpClient->expects($this->at(0))->method('sendRequest')->will($this->throwException($this->getExceptionMock(401)));
        $this->httpClient->expects($this->at(1))->method('sendRequest')->willReturn($this->createMock(ResponseInterface::class));

        $response = $this->salesforceClient->doRequest($this->createMock(RequestInterface::class));

        $this->assertInternalType('array', $response);
    }

    /**
     * @expectedException \Http\Client\Exception\HttpException
     */
    public function testInvalidToken()
    {
        $this->httpClient->method('sendRequest')->will($this->throwException($this->getExceptionMock(404)));

        $this->salesforceClient->doRequest($this->createMock(RequestInterface::class));
    }

    public function testValidToken()
    {
        $this->httpClient->method('sendRequest')->willReturn($this->createMock(ResponseInterface::class));
        $response = $this->salesforceClient->doRequest($this->createMock(RequestInterface::class));

        $this->assertInternalType('array', $response);
    }

    protected function getExceptionMock(int $code)
    {
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getStatusCode')->willReturn($code);

        return HttpException::create($this->createMock(Request::class), $response);
    }
}
