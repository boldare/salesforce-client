<?php

namespace Xsolve\SalesforceClient\Request;

use PHPUnit\Framework\TestCase;
use Xsolve\SalesforceClient\Enum\SObjectType;

class GetTest extends TestCase
{
    /**
     * @dataProvider dataProvieder
     */
    public function testGetRequest(
        SObjectType $type,
        string $id,
        array $params,
        string $expectedEndpoint,
        string $expectedMethod,
        array $expectedParams
    ) {
        $request = new Get($type, $id, $params);

        $arr = [];
        parse_str($request->getParams(), $arr);
        $this->assertSame($expectedEndpoint, $request->getEndpoint());
        $this->assertSame($expectedMethod, $request->getMethod());
        $this->assertSame($expectedParams, $arr);
        $this->assertSame(RequestInterface::TYPE_FORM, $request->getMediaType());
    }

    public function dataProvieder()
    {
        return [
            [
                SObjectType::ACCOUNT(),
                'id',
                [],
                '/sobjects/Account/id/',
                RequestInterface::METHOD_GET,
                [],
            ],
            [
                SObjectType::LEAD(),
                'id',
                ['AccountName', 'Id'],
                '/sobjects/Lead/id/',
                RequestInterface::METHOD_GET,
                ['fields' => 'AccountName,Id'],
            ],
        ];
    }
}
