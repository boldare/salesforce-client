<?php

namespace Xsolve\SalesforceClient\Request;

use PHPUnit\Framework\TestCase;
use Xsolve\SalesforceClient\Enum\ContentType;
use Xsolve\SalesforceClient\Enum\RequestMethod;
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
        RequestMethod $expectedMethod,
        array $expectedParams
    ) {
        $request = new Get($type, $id, $params);

        $this->assertSame($expectedEndpoint, $request->getEndpoint());
        $this->assertSame($expectedMethod, $request->getMethod());
        $this->assertSame($expectedParams, $request->getParams());
        $this->assertSame(ContentType::FORM(), $request->getContentType());
    }

    public function dataProvieder()
    {
        return [
            [
                SObjectType::ACCOUNT(),
                'id',
                [],
                '/sobjects/Account/id/',
                RequestMethod::GET(),
                [],
            ],
            [
                SObjectType::LEAD(),
                'id',
                ['AccountName', 'Id'],
                '/sobjects/Lead/id/',
                RequestMethod::GET(),
                ['fields' => 'AccountName,Id'],
            ],
        ];
    }
}
