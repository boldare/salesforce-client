<?php

namespace Xsolve\SalesforceClient\Request;

use PHPUnit\Framework\TestCase;
use Xsolve\SalesforceClient\Enum\ContentType;
use Xsolve\SalesforceClient\Enum\RequestMethod;
use Xsolve\SalesforceClient\Enum\SObjectType;

class DeleteTest extends TestCase
{
    public function testDeleteRequest()
    {
        $request = new Delete(SObjectType::ACCOUNT(), 'id');

        $this->assertSame('/sobjects/Account/id/', $request->getEndpoint());
        $this->assertSame(RequestMethod::DELETE(), $request->getMethod());
        $this->assertEmpty($request->getParams());
        $this->assertSame(ContentType::FORM(), $request->getContentType());
    }
}
