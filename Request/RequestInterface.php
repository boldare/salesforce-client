<?php

namespace Xsolve\SalesforceClient\Request;

interface RequestInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';

    /**
     * @return string
     */
    public function getMethod() : string;

    /**
     * @return array
     */
    public function getParams() : array;

    /**
     * @return string
     */
    public function getEndpoint() : string;
}
