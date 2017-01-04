<?php

namespace Xsolve\SalesforceClient\Security\Authentication;

class Credentials
{
    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @var string
     */
    private $grantType;

    /**
     * @var array
     */
    private $parameters;

    public function __construct(string $clientId, string $clientSecret, string $grantType, array $parameters)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->grantType = $grantType;
        $this->parameters = $parameters;
    }

    public function getClientId(): string
    {
        return $this->clientId;
    }

    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    public function getGrantType(): string
    {
        return $this->grantType;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
