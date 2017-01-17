<?php

namespace Xsolve\SalesforceClient\QueryBuilder;

use PHPUnit\Framework\TestCase;
use Xsolve\SalesforceClient\Enum\SObjectType;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\AbstractCompare;
use Xsolve\SalesforceClient\QueryBuilder\Expr\ExpressionFactory;
use Xsolve\SalesforceClient\QueryBuilder\Expr\From\AbstractFrom;
use Xsolve\SalesforceClient\QueryBuilder\Expr\GroupBy\AbstractGroupBy;
use Xsolve\SalesforceClient\QueryBuilder\Expr\OrderBy\AbstractOrderBy;
use Xsolve\SalesforceClient\QueryBuilder\Expr\OrderBy\Order;
use Xsolve\SalesforceClient\QueryBuilder\Expr\OrderBy\Strategy;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Select\AbstractSelect;
use Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters\Type;

class QueryBuilderIntegrationTest extends TestCase
{
    /**
     * @var QueryBuilder
     */
    private $qb;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->qb = new QueryBuilder();
    }

    /**
     * @dataProvider selectProvider
     */
    public function testSelect(AbstractSelect $select, AbstractFrom $from, string $expectedSoql)
    {
        $query = $this->qb->select($select)
            ->from($from)
            ->getQuery();
        $this->assertSame($expectedSoql, $query->parse());
    }

    /**
     * @dataProvider whereProvider
     */
    public function testWhere(AbstractSelect $select, AbstractFrom $from, AbstractCompare $where, string $expectedSoql)
    {
        $query = $this->qb->select($select)
            ->from($from)
            ->where($where)
            ->getQuery();
        $this->assertSame($expectedSoql, $query->parse());
    }

    /**
     * @dataProvider whereWithParametersProvider
     */
    public function testWhereWithParameters(
        AbstractSelect $select,
        AbstractFrom $from,
        AbstractCompare $where,
        array $parameters,
        string $expectedSoql
    ) {
        $query = $this->qb->select($select)
            ->from($from)
            ->where($where)
            ->setParameters($parameters)
            ->getQuery();
        $this->assertSame($expectedSoql, $query->parse());
    }

    /**
     * @dataProvider havingProvider
     */
    public function testHaving(AbstractSelect $select, AbstractFrom $from, AbstractCompare $having, string $expectedSoql)
    {
        $query = $this->qb->select($select)
            ->from($from)
            ->having($having)
            ->getQuery();
        $this->assertSame($expectedSoql, $query->parse());
    }

    /**
     * @dataProvider havingWithParametersProvider
     */
    public function testHavingWithParameters(
        AbstractSelect $select,
        AbstractFrom $from,
        AbstractCompare $having,
        array $parameters,
        string $expectedSoql
    ) {
        $query = $this->qb->select($select)
            ->from($from)
            ->having($having)
            ->setParameters($parameters)
            ->getQuery();
        $this->assertSame($expectedSoql, $query->parse());
    }

    /**
     * @dataProvider groupByProvider
     */
    public function testGroupBy(AbstractSelect $select, AbstractFrom $from, AbstractGroupBy $groupBy, string $expectedSoql)
    {
        $query = $this->qb->select($select)
            ->from($from)
            ->groupBy($groupBy)
            ->getQuery();
        $this->assertSame($expectedSoql, $query->parse());
    }

    /**
     * @dataProvider orderByProvider
     */
    public function testOrderBy(AbstractSelect $select, AbstractFrom $from, AbstractOrderBy $orderBy, string $expectedSoql)
    {
        $query = $this->qb->select($select)
            ->from($from)
            ->orderBy($orderBy)
            ->getQuery();
        $this->assertSame($expectedSoql, $query->parse());
    }

    public function testLimit()
    {
        $ef = $this->createExpressionFactory();
        $query = $this->qb->select($ef->fields(['test_field_1']))
            ->from($ef->objectType(SObjectType::ACCOUNT()))
            ->limit(10)
            ->getQuery();
        $this->assertSame('SELECT test_field_1 FROM Account LIMIT 10', $query->parse());
    }

    public function testOffset()
    {
        $ef = $this->createExpressionFactory();
        $query = $this->qb->select($ef->fields(['test_field_1']))
            ->from($ef->objectType(SObjectType::ACCOUNT()))
            ->offset(10)
            ->getQuery();
        $this->assertSame('SELECT test_field_1 FROM Account OFFSET 10', $query->parse());
    }

    public function testComplex()
    {
        $ef = $this->createExpressionFactory();
        $innerQuery = (new QueryBuilder())
            ->select($ef->count())
            ->from($ef->objectType(SObjectType::ORDER()))
            ->getQuery();
        $query = $this->qb
            ->select(
                $ef->fields(['test_field_1', 'test_field_2']),
                $ef->count('Id'),
                $ef->groupings(['Name', 'Description' => 'my_grp']),
                $ef->inner($innerQuery)
            )
            ->from($ef->objectType(SObjectType::ACCOUNT()))
            ->where($ef->equals('Id', '{firstId}'))
            ->andWhere($ef->greaterThan('Id', '{secondId}'))
            ->andWhere($ef->greaterThanOrEquals('Id', '{thirdId}'))
            ->andWhere($ef->lessThan('Id', '{fourthId}'))
            ->orWhere($ef->lessThanOrEquals('Id', '{fifthId}'), true)
            ->groupBy($ef->groupBy('test_field_2'))
            ->having($ef->like('Description', '%test'))
            ->andHaving($ef->in('Name', ['\'test name 1\'', '{fourthId}']))
            ->orHaving($ef->lessThan('Id', '{firstId}'))
            ->andHaving($ef->lessThanOrEquals('Id', '{secondId}'), true)
            ->orderBy($ef->orderBy(['Id', 'Name'], Order::DESC(), Strategy::NULLS_LAST()))
            ->limit(10)
            ->offset(5)
            ->setParameters([
                'firstId' => 123,
                'secondId' => [
                    'value' => 123,
                    'type' => Type::INT(),
                ],
                'thirdId' => [
                    'value' => 123.45,
                    'type' => Type::FLOAT(),
                ],
                'fourthId' => [
                    'value' => 1484575327,
                    'type' => Type::DATETIME(),
                ],
                'fifthId' => [
                    'value' => 0,
                    'type' => Type::BOOL(),
                ],
            ])
            ->getQuery();
        $expectedQuery = 'SELECT test_field_1, test_field_2, COUNT(Id), GROUPING(Name) grp_Name, GROUPING(Description) my_grp, (SELECT COUNT() FROM Order) '
            .'FROM Account '
            .'WHERE (Id = \'123\' '
            .'AND Id > 123 '
            .'AND Id >= 123.45 '
            .'AND Id < 2017-01-16T14:02:07+00:00) '
            .'OR Id <= false '
            .'GROUP BY test_field_2 '
            .'HAVING (Description LIKE %test '
            .'AND Name IN (\'test name 1\', 2017-01-16T14:02:07+00:00) '
            .'OR Id < \'123\') '
            .'AND Id <= 123 '
            .'ORDER BY Id, Name DESC NULLS LAST '
            .'LIMIT 10 '
            .'OFFSET 5';
        $this->assertSame($expectedQuery, $query->parse());
    }

    public function selectProvider(): array
    {
        $ef = $this->createExpressionFactory();

        return [
            'fields' => [
                $ef->fields(['test_field_1', 'test_field_2']),
                $ef->objectType(SObjectType::ACCOUNT()),
                'SELECT test_field_1, test_field_2 FROM Account',
            ],
            'count' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                'SELECT COUNT() FROM Account',
            ],
            'count_field' => [
                $ef->count('test_field_1'),
                $ef->objectType(SObjectType::ACCOUNT()),
                'SELECT COUNT(test_field_1) FROM Account',
            ],
            'grouping_named' => [
                $ef->grouping('test_field_1', 'test_grouping'),
                $ef->objectType(SObjectType::ACCOUNT()),
                'SELECT GROUPING(test_field_1) test_grouping FROM Account',
            ],
            'grouping_default' => [
                $ef->grouping('test_field_1'),
                $ef->objectType(SObjectType::ACCOUNT()),
                'SELECT GROUPING(test_field_1) grp_test_field_1 FROM Account',
            ],
            'groupings' => [
                $ef->groupings([
                    'test_field_1' => 'test_grouping',
                    'test_field_2',
                ]),
                $ef->objectType(SObjectType::ACCOUNT()),
                'SELECT GROUPING(test_field_1) test_grouping, GROUPING(test_field_2) grp_test_field_2 FROM Account',
            ],
            'inner' => [
                $ef->inner((new QueryBuilder())
                    ->select($ef->count())
                    ->from($ef->objectType(SObjectType::LEAD()))
                    ->getQuery()
                ),
                $ef->objectType(SObjectType::ACCOUNT()),
                'SELECT (SELECT COUNT() FROM Lead) FROM Account',
            ],
            'typeof' => [
                $ef->typeof('test_field_1'),
                $ef->objectType(SObjectType::ACCOUNT()),
                'SELECT TYPEOF test_field_1 END FROM Account',
            ],
        ];
    }

    public function whereProvider(): array
    {
        $ef = $this->createExpressionFactory();

        return [
            'equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->equals('test_field_1', '123'),
                'SELECT COUNT() FROM Account WHERE test_field_1 = 123',
            ],
            'greater_than' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->greaterThan('test_field_1', '123'),
                'SELECT COUNT() FROM Account WHERE test_field_1 > 123',
            ],
            'greater_than_or_equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->greaterThanOrEquals('test_field_1', '123'),
                'SELECT COUNT() FROM Account WHERE test_field_1 >= 123',
            ],
            'less_than' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->lessThan('test_field_1', '123'),
                'SELECT COUNT() FROM Account WHERE test_field_1 < 123',
            ],
            'less_than_or_equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->lessThanOrEquals('test_field_1', '123'),
                'SELECT COUNT() FROM Account WHERE test_field_1 <= 123',
            ],
            'like' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->like('test_field_1', '\'%abc\''),
                'SELECT COUNT() FROM Account WHERE test_field_1 LIKE \'%abc\'',
            ],
            'not_equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->notEquals('test_field_1', '123'),
                'SELECT COUNT() FROM Account WHERE test_field_1 != 123',
            ],
            'in' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->in('test_field_1', [123, 456]),
                'SELECT COUNT() FROM Account WHERE test_field_1 IN (123, 456)',
            ],
            'not_in' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->notIn('test_field_1', [123, 456]),
                'SELECT COUNT() FROM Account WHERE test_field_1 NOT IN (123, 456)',
            ],
        ];
    }

    public function whereWithParametersProvider(): array
    {
        $ef = $this->createExpressionFactory();

        return [
            'equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->equals('test_field_1', '{testValue}'),
                ['testValue' => '123'],
                'SELECT COUNT() FROM Account WHERE test_field_1 = \'123\'',
            ],
            'greater_than' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->greaterThan('test_field_1', '{testValue}'),
                ['testValue' => '123'],
                'SELECT COUNT() FROM Account WHERE test_field_1 > \'123\'',
            ],
            'greater_than_or_equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->greaterThanOrEquals('test_field_1', '{testValue}'),
                ['testValue' => '123'],
                'SELECT COUNT() FROM Account WHERE test_field_1 >= \'123\'',
            ],
            'less_than' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->lessThan('test_field_1', '{testValue}'),
                ['testValue' => '123'],
                'SELECT COUNT() FROM Account WHERE test_field_1 < \'123\'',
            ],
            'less_than_or_equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->lessThanOrEquals('test_field_1', '{testValue}'),
                ['testValue' => '123'],
                'SELECT COUNT() FROM Account WHERE test_field_1 <= \'123\'',
            ],
            'like' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->like('test_field_1', '{testValue}'),
                ['testValue' => '%abc'],
                'SELECT COUNT() FROM Account WHERE test_field_1 LIKE \'%abc\'',
            ],
            'not_equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->notEquals('test_field_1', '{testValue}'),
                ['testValue' => '123'],
                'SELECT COUNT() FROM Account WHERE test_field_1 != \'123\'',
            ],
            'in' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->in('test_field_1', ['{testValue1}', '{testValue2}']),
                ['testValue1' => 123, 'testValue2' => 456],
                'SELECT COUNT() FROM Account WHERE test_field_1 IN (\'123\', \'456\')',
            ],
            'not_in' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->notIn('test_field_1', ['{testValue1}', '{testValue2}']),
                ['testValue1' => 123, 'testValue2' => 456],
                'SELECT COUNT() FROM Account WHERE test_field_1 NOT IN (\'123\', \'456\')',
            ],
        ];
    }

    public function havingProvider(): array
    {
        $ef = $this->createExpressionFactory();

        return [
            'equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->equals('test_field_1', '123'),
                'SELECT COUNT() FROM Account HAVING test_field_1 = 123',
            ],
            'greater_than' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->greaterThan('test_field_1', '123'),
                'SELECT COUNT() FROM Account HAVING test_field_1 > 123',
            ],
            'greater_than_or_equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->greaterThanOrEquals('test_field_1', '123'),
                'SELECT COUNT() FROM Account HAVING test_field_1 >= 123',
            ],
            'less_than' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->lessThan('test_field_1', '123'),
                'SELECT COUNT() FROM Account HAVING test_field_1 < 123',
            ],
            'less_than_or_equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->lessThanOrEquals('test_field_1', '123'),
                'SELECT COUNT() FROM Account HAVING test_field_1 <= 123',
            ],
            'like' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->like('test_field_1', '\'%abc\''),
                'SELECT COUNT() FROM Account HAVING test_field_1 LIKE \'%abc\'',
            ],
            'not_equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->notEquals('test_field_1', '123'),
                'SELECT COUNT() FROM Account HAVING test_field_1 != 123',
            ],
            'in' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->in('test_field_1', [123, 456]),
                'SELECT COUNT() FROM Account HAVING test_field_1 IN (123, 456)',
            ],
            'not_in' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->notIn('test_field_1', [123, 456]),
                'SELECT COUNT() FROM Account HAVING test_field_1 NOT IN (123, 456)',
            ],
        ];
    }

    public function havingWithParametersProvider(): array
    {
        $ef = $this->createExpressionFactory();

        return [
            'equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->equals('test_field_1', '{testValue}'),
                ['testValue' => '123'],
                'SELECT COUNT() FROM Account HAVING test_field_1 = \'123\'',
            ],
            'greater_than' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->greaterThan('test_field_1', '{testValue}'),
                ['testValue' => '123'],
                'SELECT COUNT() FROM Account HAVING test_field_1 > \'123\'',
            ],
            'greater_than_or_equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->greaterThanOrEquals('test_field_1', '{testValue}'),
                ['testValue' => '123'],
                'SELECT COUNT() FROM Account HAVING test_field_1 >= \'123\'',
            ],
            'less_than' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->lessThan('test_field_1', '{testValue}'),
                ['testValue' => '123'],
                'SELECT COUNT() FROM Account HAVING test_field_1 < \'123\'',
            ],
            'less_than_or_equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->lessThanOrEquals('test_field_1', '{testValue}'),
                ['testValue' => '123'],
                'SELECT COUNT() FROM Account HAVING test_field_1 <= \'123\'',
            ],
            'like' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->like('test_field_1', '{testValue}'),
                ['testValue' => '%abc'],
                'SELECT COUNT() FROM Account HAVING test_field_1 LIKE \'%abc\'',
            ],
            'not_equals' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->notEquals('test_field_1', '{testValue}'),
                ['testValue' => '123'],
                'SELECT COUNT() FROM Account HAVING test_field_1 != \'123\'',
            ],
            'in' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->in('test_field_1', ['{testValue1}', '{testValue2}']),
                ['testValue1' => 123, 'testValue2' => 456],
                'SELECT COUNT() FROM Account HAVING test_field_1 IN (\'123\', \'456\')',
            ],
            'not_in' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->notIn('test_field_1', ['{testValue1}', '{testValue2}']),
                ['testValue1' => 123, 'testValue2' => 456],
                'SELECT COUNT() FROM Account HAVING test_field_1 NOT IN (\'123\', \'456\')',
            ],
        ];
    }

    public function groupByProvider(): array
    {
        $ef = $this->createExpressionFactory();

        return [
            'simple' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->groupBy('test_field_1', 'test_field_2'),
                'SELECT COUNT() FROM Account GROUP BY test_field_1, test_field_2',
            ],
            'cube' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->groupByCube('test_field_1', 'test_field_2'),
                'SELECT COUNT() FROM Account GROUP BY CUBE(test_field_1, test_field_2)',
            ],
            'rollup' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->groupByRollup('test_field_1', 'test_field_2'),
                'SELECT COUNT() FROM Account GROUP BY ROLLUP(test_field_1, test_field_2)',
            ],
        ];
    }


    public function orderByProvider(): array
    {
        $ef = $this->createExpressionFactory();

        return [
            'default' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->orderBy(['test_field_1', 'test_field_2']),
                'SELECT COUNT() FROM Account ORDER BY test_field_1, test_field_2 ASC NULLS FIRST',
            ],
            'desc' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->orderBy(['test_field_1', 'test_field_2'], Order::DESC()),
                'SELECT COUNT() FROM Account ORDER BY test_field_1, test_field_2 DESC NULLS FIRST',
            ],
            'nulls_last' => [
                $ef->count(),
                $ef->objectType(SObjectType::ACCOUNT()),
                $ef->orderBy(['test_field_1', 'test_field_2'], Order::DESC(), Strategy::NULLS_LAST()),
                'SELECT COUNT() FROM Account ORDER BY test_field_1, test_field_2 DESC NULLS LAST',
            ],
        ];
    }

    private function createExpressionFactory(): ExpressionFactory
    {
        return new ExpressionFactory();
    }
}
