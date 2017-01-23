<?php

namespace Xsolve\SalesforceClient\Request;

use PHPUnit\Framework\TestCase;
use Xsolve\SalesforceClient\Enum\ContentType;
use Xsolve\SalesforceClient\Enum\RequestMethod;
use Xsolve\SalesforceClient\Enum\SObjectType;

class UpdateTest extends TestCase
{
    public function testUpdateRequest()
    {
        $params = ['Name' => 'name'];
        $request = new Update(SObjectType::ACCOUNT(), 'id', $params);

        $this->assertSame('/sobjects/Account/id/', $request->getEndpoint());
        $this->assertSame(RequestMethod::PATCH(), $request->getMethod());
        $this->assertSame($params, $request->getParams());
        $this->assertSame(ContentType::JSON(), $request->getContentType());
    }
}
