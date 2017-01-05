<?php

namespace Xsolve\SalesforceClient\Tests\Security\Authentication;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Xsolve\SalesforceClient\ {
    Http\ClientInterface,
    Security\Authentication\Authenticator,
    Security\Authentication\CredentialsInterface,
    Security\Authentication\Strategy\RegenerateStrategyInterface,
    Security\Token\TokenInterface
};

class AuthenticatorTest extends TestCase
{

    /**
     * @var Authenticator
     */
    protected $authenticator;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|ClientInterface
     */
    protected $client;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|CredentialsInterface
     */
    protected $credentials;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|ResponseInterface
     */
    protected $response;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|RegenerateStrategyInterface
     */
    protected $regenerateStrategy;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|TokenInterface
     */
    protected $token;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->client = $this->createMock(ClientInterface::class);
        $this->credentials = $this->createMock(CredentialsInterface::class);
        $this->response = $this->createMock(ResponseInterface::class);
        $this->regenerateStrategy = $this->createMock(RegenerateStrategyInterface::class);
        $this->token = $this->createMock(TokenInterface::class);

        $this->client->method('request')->willReturn($this->response);
        $this->authenticator = new Authenticator($this->client, [$this->regenerateStrategy]);
    }

    /**
     * @expectedException Xsolve\SalesforceClient\Security\Authentication\AuthorizationFailedException
     */
    public function testEmptyResponse()
    {
        $this->authenticator->authenticate($this->credentials);
    }

    /**
     * @expectedException Xsolve\SalesforceClient\Security\Authentication\AuthorizationFailedException
     */
    public function testBadResponse()
    {
        $this->response->method('getBody')->willReturn('["key"]');

        $this->authenticator->authenticate($this->credentials);
    }

    public function testValidResponse()
    {
        $this->response->method('getBody')->willReturn($this->getValidResponse());

        $token = $this->authenticator->authenticate($this->credentials);

        $this->assertInstanceOf(TokenInterface::class, $token);

        $this->assertEquals($token->getAccessToken(), 'Token');
        $this->assertEquals($token->getTokenType(), 'Type');
        $this->assertEquals($token->getInstanceUrl(), 'http://example.com/');
        $this->assertEquals($token->getRefreshToken(), '');
    }

    /**
     * @expectedException \Xsolve\SalesforceClient\Security\Authentication\Strategy\NotFoundException
     */
    public function testRegenerateStrategyNotFound()
    {
        $this->regenerateStrategy->method('support')->willReturn(false);

        $this->authenticator->regenerate($this->credentials, $this->token);
    }

    public function testRegenerateExistingStrategy()
    {
        $this->regenerateStrategy->method('support')->willReturn(true);
        $this->response->method('getBody')->willReturn($this->getValidResponse());

        $token = $this->authenticator->regenerate($this->credentials, $this->token);

        $this->assertInstanceOf(TokenInterface::class, $token);
    }

    protected function getValidResponse() : string
    {
        return '{"token_type":"Type","access_token":"Token","instance_url":"http:\/\/example.com\/"}';
    }
}
