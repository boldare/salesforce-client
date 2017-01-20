<?php

namespace Xsolve\SalesforceClient\Request;

use PHPUnit\Framework\TestCase;
use Xsolve\SalesforceClient\Enum\SObjectType;

class CreateTest extends TestCase
{
    public function testUpdateRequest()
    {
        $params = ['Name' => 'name'];
        $request = new Create(SObjectType::ACCOUNT(), $params);

        $this->assertSame('/sobjects/Account/', $request->getEndpoint());
        $this->assertSame(RequestInterface::METHOD_POST, $request->getMethod());
        $this->assertSame($params, json_decode($request->getParams(), true));
        $this->assertSame(RequestInterface::TYPE_JSON, $request->getMediaType());
    }
}
