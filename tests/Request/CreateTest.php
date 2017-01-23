<?php

namespace Xsolve\SalesforceClient\Request;

use PHPUnit\Framework\TestCase;
use Xsolve\SalesforceClient\Enum\ContentType;
use Xsolve\SalesforceClient\Enum\RequestMethod;
use Xsolve\SalesforceClient\Enum\SObjectType;

class CreateTest extends TestCase
{
    public function testUpdateRequest()
    {
        $params = ['Name' => 'name'];
        $request = new Create(SObjectType::ACCOUNT(), $params);

        $this->assertSame('/sobjects/Account/', $request->getEndpoint());
        $this->assertSame(RequestMethod::POST(), $request->getMethod());
        $this->assertSame($params, $request->getParams());
        $this->assertSame(ContentType::JSON(), $request->getContentType());
    }
}
