<?php

namespace Xsolve\SalesforceClient\Request;

use PHPUnit\Framework\TestCase;
use Xsolve\SalesforceClient\Enum\ContentType;
use Xsolve\SalesforceClient\Enum\RequestMethod;

class QueryNextTest extends TestCase
{
    public function testQueryNext()
    {
        $request = new QueryNext('nextQueryId');

        $this->assertSame('/query/nextQueryId', $request->getEndpoint());
        $this->assertSame(RequestMethod::GET(), $request->getMethod());
        $this->assertSame(ContentType::FORM(), $request->getContentType());
        $this->assertEmpty($request->getParams());
    }
}
