<?php

namespace Xsolve\SalesforceClient\Security\Authentication;

interface CredentialsInterface
{
    /**
     * @return array
     */
    public function getCredentials() : array;

    /**
     * @return string
     */
    public function getGrantType() : string;

    /**
     * @return string
     */
    public function getClientId() : string;

    /**
     * @return string
     */
    public function getClientSecret() : string;
}
