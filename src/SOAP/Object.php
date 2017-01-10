<?php

namespace Xsolve\SalesforceClient\SOAP;

abstract class Object
{
    /**
     * @var string
     */
    protected $token;

    public function setToken(string $token): Object
    {
        $this->token = $token;

        return $this;
    }

    abstract public function getXml(): string;
}
