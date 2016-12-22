<?php

namespace Xsolve\SalesforceClient\Storage;

use Blablacar\Redis\Client;
use Xsolve\SalesforceClient\Security\Token\TokenInterface;

class RedisTokenStorage implements TokenStorageInterface
{
    const KEY = 'salesforce_token';

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get(): TokenInterface
    {
        $token = $this->client->get(self::KEY);

        if ($token === null) {
            return;
        }

        return unserialize($token);
    }

    public function has(): bool
    {
        return (bool) $this->client->exists(self::KEY);
    }

    public function save(TokenInterface $token)
    {
        $this->client->set(self::KEY, serialize($token));
    }
}
