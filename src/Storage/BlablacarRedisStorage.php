<?php

namespace Xsolve\SalesforceClient\Storage;

use Blablacar\Redis\Client;
use Xsolve\SalesforceClient\Security\Token\TokenInterface;

class BlablacarRedisStorage implements TokenStorageInterface
{
    const DEFAULT_KEY = 'salesforce_token';

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $key;

    public function __construct(Client $client, string $key = self::DEFAULT_KEY)
    {
        $this->client = $client;
        $this->key = $key;
    }

    public function get(): TokenInterface
    {
        $token = $this->client->get($this->key);

        if ($token === null) {
            throw new \LogicException('No token has been set');
        }

        return unserialize($token);
    }

    public function has(): bool
    {
        return (bool) $this->client->exists($this->key);
    }

    public function save(TokenInterface $token)
    {
        $this->client->set($this->key, serialize($token));
    }
}
