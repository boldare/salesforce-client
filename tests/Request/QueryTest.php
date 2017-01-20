<?php

namespace Xsolve\SalesforceClient\Request;

use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase
{
    /**
     * @dataProvider endpointsProvider
     */
    public function testQuery($query, $endpoint)
    {
        $request = new Query($query);

        $this->assertSame(RequestInterface::METHOD_GET, $request->getMethod());
        $this->assertEmpty($request->getParams());
        $this->assertSame($endpoint, urldecode($request->getEndpoint()));
        $this->assertSame(RequestInterface::TYPE_FORM, $request->getMediaType());
    }

    public function endpointsProvider()
    {
        return [
            [
                'SELECT Name FROM Account',
                '/query/?q=SELECT Name FROM Account',
            ],
            [
                'SELECT Name FROM Account WHERE Id = "expectedId"',
                '/query/?q=SELECT Name FROM Account WHERE Id = "expectedId"',
            ],
            [
                'SELECT COUNT(*), Name FROM Account',
                '/query/?q=SELECT COUNT(*), Name FROM Account',
            ],
        ];
    }
}
