<?php

namespace Xsolve\SalesforceClient\Generator;

use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Xsolve\SalesforceClient\Security\Authentication\AuthenticatorInterface;
use Xsolve\SalesforceClient\Security\Authentication\Credentials;
use Xsolve\SalesforceClient\Security\Token\TokenInterface;
use Xsolve\SalesforceClient\Storage\TokenStorageInterface;

class TokenGeneratorTest extends TestCase
{
    /**
     * @var TokenGenerator
     */
    private $generator;

    /**
     * @var Credentials
     */
    private $credentials;

    /**
     * @var ObjectProphecy|AuthenticatorInterface
     */
    private $authenticator;

    /**
     * @var ObjectProphecy|TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->credentials = $this->prophesize(Credentials::class)->reveal();
        $this->authenticator = $this->prophesize(AuthenticatorInterface::class);
        $this->tokenStorage = $this->prophesize(TokenStorageInterface::class);
        $this->generator = new TokenGenerator(
            $this->credentials,
            $this->authenticator->reveal(),
            $this->tokenStorage->reveal()
        );
    }

    public function testGetTokenPresentInStorage()
    {
        $token = $this->prophesize(TokenInterface::class)->reveal();
        $this->tokenStorage->has()->willReturn(true);
        $this->tokenStorage->get()->shouldBeCalled()->willReturn($token);

        $this->assertSame($token, $this->generator->getToken());
    }

    public function testGetToken()
    {
        $token = $this->prophesize(TokenInterface::class)->reveal();
        $this->tokenStorage->has()->willReturn(false);
        $this->tokenStorage->get()->shouldNotBeCalled();
        $this->authenticator->authenticate($this->credentials)->willReturn($token);
        $this->tokenStorage->save($token)->shouldBeCalled();

        $this->assertSame($token, $this->generator->getToken());
    }

    public function testRegenerateToken()
    {
        $oldToken = $this->prophesize(TokenInterface::class)->reveal();
        $newToken = $this->prophesize(TokenInterface::class)->reveal();

        $this->authenticator->regenerate($this->credentials, $oldToken)->willReturn($newToken);
        $this->tokenStorage->save($newToken)->shouldBeCalled();

        $this->assertSame($newToken, $this->generator->regenerateToken($oldToken));
    }
}
