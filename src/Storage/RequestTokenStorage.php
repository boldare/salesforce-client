<?php

namespace Xsolve\SalesforceClient\Storage;

use Xsolve\SalesforceClient\Security\Token\TokenInterface;

class RequestTokenStorage implements TokenStorageInterface
{
    /**
     * @var TokenInterface|null
     */
    protected $token = null;

    /**
     * @return TokenInterface
     *
     * @throws \LogicException if the token is not set
     */
    public function get(): TokenInterface
    {
        if (!$this->has()) {
            throw new \LogicException('No token has been set');
        }

        return $this->token;
    }

    /**
     * {@inheritdoc}
     */
    public function has(): bool
    {
        return $this->token instanceof TokenInterface;
    }

    /**
     * {@inheritdoc}
     */
    public function save(TokenInterface $token)
    {
        $this->token = $token;
    }
}
