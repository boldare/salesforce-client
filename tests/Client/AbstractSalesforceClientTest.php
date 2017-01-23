<?php

namespace Xsolve\SalesforceClient\Client;

use PHPUnit\Framework\TestCase;
use Xsolve\SalesforceClient\Generator\TokenGeneratorInterface;
use Xsolve\SalesforceClient\Http\ClientInterface;
use Xsolve\SalesforceClient\Security\Token\TokenInterface;

abstract class AbstractSalesforceClientTest extends TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|ClientInterface
     */
    protected $httpClient;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|TokenGeneratorInterface
     */
    protected $tokenGenerator;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $token = $this->createMock(TokenInterface::class);

        $this->tokenGenerator = $this->createMock(TokenGeneratorInterface::class);
        $this->tokenGenerator->method('getToken')->willReturn($token);
        $this->tokenGenerator->method('regenerateToken')->willReturn($token);

        $this->httpClient = $this->createMock(ClientInterface::class);
    }
}
