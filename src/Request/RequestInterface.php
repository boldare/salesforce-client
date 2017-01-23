<?php

namespace Xsolve\SalesforceClient\Request;

use Xsolve\SalesforceClient\Enum\ContentType;
use Xsolve\SalesforceClient\Enum\RequestMethod;

interface RequestInterface
{
    public function getMethod(): RequestMethod;

    public function getParams(): array;

    public function getEndpoint(): string;

    public function getContentType(): ContentType;
}
