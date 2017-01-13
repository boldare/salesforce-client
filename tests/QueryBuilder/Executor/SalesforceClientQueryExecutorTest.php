<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Executor;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use Xsolve\SalesforceClient\Client\SalesforceClient;
use Xsolve\SalesforceClient\QueryBuilder\Query;
use Xsolve\SalesforceClient\QueryBuilder\Records;
use Xsolve\SalesforceClient\Request\Query as RequestQuery;
use Xsolve\SalesforceClient\Request\QueryNext;

class SalesforceClientQueryExecutorTest extends TestCase
{
    /**
     * @var SalesforceClientQueryExecutor
     */
    private $executor;

    /**
     * @var ObjectProphecy|SalesforceClient
     */
    private $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = $this->prophesize(SalesforceClient::class);
        $this->executor = new SalesforceClientQueryExecutor($this->client->reveal());
    }

    /**
     * @dataProvider responseProvider
     */
    public function testGetRecords(
        array $response,
        int $expectedCount,
        int $expectedTotalSize,
        bool $expectedHasNext,
        array $expectedRecords,
        string $expectedNextRecordsIdentifier
    ) {
        $query = $this->prophesize(Query::class);
        $query->parse()->willReturn('SELECT a FROM b');
        $this->client->doRequest(Argument::allOf(
            Argument::type(RequestQuery::class),
            Argument::that(function (RequestQuery $query) {
                return '/query/?q=SELECT+a+FROM+b' === $query->getEndpoint();
            })
        ))->willReturn($response);

        $records = $this->executor->getRecords($query->reveal());
        $this->assertCount($expectedCount, $records);
        $this->assertSame($expectedTotalSize, $records->getTotalSize());
        $this->assertSame($expectedHasNext, $records->hasNext());
        $this->assertSame($expectedRecords, iterator_to_array($records));
        $this->assertSame($expectedNextRecordsIdentifier, $records->getNextIdentifier());
    }

    /**
     * @dataProvider responseProvider
     */
    public function testGetNextRecords(
        array $response,
        int $expectedCount,
        int $expectedTotalSize,
        bool $expectedHasNext,
        array $expectedRecords,
        string $expectedNextRecordsIdentifier
    ) {
        $records = $this->prophesize(Records::class);
        $records->hasNext()->willReturn(true);
        $records->getNextIdentifier()->willReturn('test-next-identifier');
        $this->client->doRequest(Argument::allOf(
            Argument::type(QueryNext::class),
            Argument::that(function (QueryNext $query) {
                return '/query/test-next-identifier' === $query->getEndpoint();
            })
        ))->willReturn($response);

        $nextRecords = $this->executor->getNextRecords($records->reveal());
        $this->assertInstanceOf(Records::class, $nextRecords);
        $this->assertCount($expectedCount, $nextRecords);
        $this->assertSame($expectedTotalSize, $nextRecords->getTotalSize());
        $this->assertSame($expectedHasNext, $nextRecords->hasNext());
        $this->assertSame($expectedRecords, iterator_to_array($nextRecords));
        $this->assertSame($expectedNextRecordsIdentifier, $nextRecords->getNextIdentifier());
    }

    public function testGetNextRecordsNoNextPage()
    {
        $records = $this->prophesize(Records::class);
        $records->hasNext()->willReturn(false);
        $this->client->doRequest(Argument::any())->shouldNotBeCalled();

        $this->assertNull($this->executor->getNextRecords($records->reveal()));
    }

    private function assertRecordsMatchResponse(Records $records, array $response)
    {
        $this->assertCount(2, $records);
        $this->assertSame(3, $records->getTotalSize());
        $this->assertTrue($records->hasNext());
        $this->assertSame($response['records'], iterator_to_array($records));
    }

    public function responseProvider(): array
    {
        return [
            [
                [
                    'done' => true,
                    'totalSize' => 3,
                    'records' => [
                        [
                            'attributes' => [
                                'type' => 'Account',
                                'url' => '/services/data/v20.0/sobjects/Account/001D000000IRFmaIAH',
                            ],
                            'name' => 'Test 1',
                        ],
                        [
                            'attributes' => [
                                'type' => 'Account',
                                'url' => '/services/data/v20.0/sobjects/Account/001D000000IomazIAB',
                            ],
                            'name' => 'Test 2',
                        ],
                    ],
                    'nextRecordsUrl' => '/services/data/v20.0/query/01gD0000002HU6KIAW-2000',
                ],
                2,
                3,
                true,
                [
                    [
                        'attributes' => [
                            'type' => 'Account',
                            'url' => '/services/data/v20.0/sobjects/Account/001D000000IRFmaIAH',
                        ],
                        'name' => 'Test 1',
                    ],
                    [
                        'attributes' => [
                            'type' => 'Account',
                            'url' => '/services/data/v20.0/sobjects/Account/001D000000IomazIAB',
                        ],
                        'name' => 'Test 2',
                    ],
                ],
                '01gD0000002HU6KIAW-2000',
            ],
        ];
    }
}
