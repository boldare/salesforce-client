<?php

namespace Xsolve\SalesforceClient\Request;

use PHPUnit\Framework\TestCase;
use Xsolve\SalesforceClient\Enum\SObjectType;

class DeleteTest extends TestCase
{
    public function testDeleteRequest()
    {
        $request = new Delete(SObjectType::ACCOUNT(), 'id');

        $this->assertSame('/sobjects/Account/id/', $request->getEndpoint());
        $this->assertSame(RequestInterface::METHOD_DELETE, $request->getMethod());
        $this->assertEmpty($request->getParams());
        $this->assertSame(RequestInterface::TYPE_FORM, $request->getMediaType());
    }
}
