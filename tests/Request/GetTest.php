<?php

namespace Xsolve\SalesforceClient\Request;

use PHPUnit\Framework\TestCase;
use Xsolve\SalesforceClient\Enum\SObjectType;

class GetTest extends TestCase
{
    /**
     * @dataProvider dataProvieder
     */
    public function testGetRequest(array $params)
    {
        $request = new Get($params['type'], $params['id'], $params['params']);

        $this->assertSame($params['expectedEndpoint'], $request->getEndpoint());
        $this->assertSame($params['expectedMethod'], $request->getMethod());
        $this->assertSame($params['expectedParams'], $request->getParams());
    }

    public function dataProvieder()
    {
        return [
            [
                [
                    'type' => SObjectType::ACCOUNT(),
                    'id' => 'id',
                    'params' => [],
                    'expectedEndpoint' => '/sobjects/Account/id/',
                    'expectedMethod' => RequestInterface::METHOD_GET,
                    'expectedParams' => [],
                ],
            ],
            [
                [
                    'type' => SObjectType::LEAD(),
                    'id' => 'id',
                    'params' => ['AccountName', 'Id'],
                    'expectedEndpoint' => '/sobjects/Lead/id/',
                    'expectedMethod' => RequestInterface::METHOD_GET,
                    'expectedParams' => [
                        'query' => [
                            'fields' => 'AccountName,Id',
                        ],
                    ],
                ],
            ],
        ];
    }
}
