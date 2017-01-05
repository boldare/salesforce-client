<?php

namespace Xsolve\SalesforceClient\Security\Token;

interface TokenInterface extends \Serializable
{
    /**
     * @return string
     */
    public function getTokenType(): string;

    /**
     * @return string
     */
    public function getAccessToken(): string;

    /**
     * @return string
     */
    public function getRefreshToken(): string;

    /**
     * @return string
     */
    public function getInstanceUrl(): string;
}
