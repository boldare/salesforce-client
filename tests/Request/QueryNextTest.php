<?php

namespace Xsolve\SalesforceClient\Request;

use PHPUnit\Framework\TestCase;

class QueryNextTest extends TestCase
{
    public function testQueryNext()
    {
        $request = new QueryNext('nextQueryId');

        $this->assertSame('/query/nextQueryId', $request->getEndpoint());
        $this->assertSame(RequestInterface::METHOD_GET, $request->getMethod());
        $this->assertEmpty($request->getParams());
    }
}
