<?php

namespace Xsolve\SalesforceClient\Request;

interface RequestInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';

    const TYPE_FORM = 'application/x-www-form-urlencoded';
    const TYPE_JSON = 'application/json';

    public function getMethod(): string;

    public function getParams(): string;

    public function getEndpoint(): string;

    public function getMediaType(): string;
}
