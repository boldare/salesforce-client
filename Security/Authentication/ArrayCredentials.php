<?php

namespace Xsolve\SalesforceClient\Security\Authentication;

class ArrayCredentials implements CredentialsInterface
{
    protected $credentials;

    public function __construct(array $credentials)
    {
        $this->credentials = $credentials;
    }

    public function getClientId(): string
    {
        return $this->credentials['client_id'];
    }

    public function getClientSecret(): string
    {
        return $this->credentials['client_secret'];
    }

    public function getCredentials(): array
    {
        return $this->credentials;
    }

    public function getGrantType(): string
    {
        return $this->credentials['grant_type'];
    }

}
