<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr;

use PHPUnit\Framework\TestCase;
use Xsolve\SalesforceClient\Enum\SObjectType;
use Xsolve\SalesforceClient\QueryBuilder\Query;

class ExpressionFactoryTest extends TestCase
{
    /**
     * @var ExpressionFactory
     */
    private $factory;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->factory = new ExpressionFactory();
    }

    public function testFields()
    {
        $result = $this->factory->fields(['test 1', 'test 2']);
        $this->assertEquals(new Select\Fields(['test 1', 'test 2']), $result);
    }

    public function testCount()
    {
        $result = $this->factory->count('test');
        $this->assertEquals(new Select\Count('test'), $result);
    }

    public function testInner()
    {
        $inner = $this->prophesize(Query::class);
        $result = $this->factory->inner($inner->reveal());
        $this->assertEquals(new Select\Inner($inner->reveal()), $result);
    }

    public function testGrouping()
    {
        $result = $this->factory->grouping('test_source', 'test_target');
        $this->assertEquals(new Select\Grouping('test_source', 'test_target'), $result);
    }

    public function testGroupingNoTarget()
    {
        $result = $this->factory->grouping('test_source');
        $this->assertEquals(new Select\Grouping('test_source', 'grp_test_source'), $result);
    }

    public function testGroupings()
    {
        $result = $this->factory->groupings([
            'test_source_1' => 'test_target_1',
            'test_source_2',
        ]);

        $this->assertEquals(new Select\MultipleGrouping([
            new Select\Grouping('test_source_1', 'test_target_1'),
            new Select\Grouping('test_source_2', 'grp_test_source_2'),
        ]), $result);
    }

    public function testObjectType()
    {
        $result = $this->factory->objectType(SObjectType::ACCOUNT());
        $this->assertEquals(new From\ObjectType(SObjectType::ACCOUNT()), $result);
    }

    public function testEquals()
    {
        $result = $this->factory->equals('test_left', 'test_right');
        $this->assertEquals(new Compare\Equals('test_left', 'test_right'), $result);
    }

    public function testGreaterThan()
    {
        $result = $this->factory->greaterThan('test_left', 'test_right');
        $this->assertEquals(new Compare\GreaterThan('test_left', 'test_right'), $result);
    }

    public function testGreaterThanOrEquals()
    {
        $result = $this->factory->greaterThanOrEquals('test_left', 'test_right');
        $this->assertEquals(new Compare\GreaterThanOrEquals('test_left', 'test_right'), $result);
    }

    public function testIn()
    {
        $result = $this->factory->in('test_left', ['test_value_1', 'test_value_2']);
        $this->assertEquals(new Compare\In('test_left', ['test_value_1', 'test_value_2']), $result);
    }

    public function testLessThan()
    {
        $result = $this->factory->lessThan('test_left', 'test_right');
        $this->assertEquals(new Compare\LessThan('test_left', 'test_right'), $result);
    }

    public function testLessThanOrEquals()
    {
        $result = $this->factory->lessThanOrEquals('test_left', 'test_right');
        $this->assertEquals(new Compare\LessThanOrEquals('test_left', 'test_right'), $result);
    }

    public function testLike()
    {
        $result = $this->factory->like('test_left', 'test_right');
        $this->assertEquals(new Compare\Like('test_left', 'test_right'), $result);
    }

    public function testNotEquals()
    {
        $result = $this->factory->notEquals('test_left', 'test_right');
        $this->assertEquals(new Compare\NotEquals('test_left', 'test_right'), $result);
    }

    public function testNotIn()
    {
        $result = $this->factory->notIn('test_left', ['test_value_1', 'test_value_2']);
        $this->assertEquals(new Compare\NotIn('test_left', ['test_value_1', 'test_value_2']), $result);
    }

    public function testGroupBy()
    {
        $result = $this->factory->groupBy('test_field_1', 'test_field_2');
        $this->assertEquals(new GroupBy\Fields(['test_field_1', 'test_field_2']), $result);
    }

    public function testGroupByRollup()
    {
        $result = $this->factory->groupByRollup('test_field_1', 'test_field_2');
        $this->assertEquals(new GroupBy\Rollup(['test_field_1', 'test_field_2']), $result);
    }

    public function testGroupByCube()
    {
        $result = $this->factory->groupByCube('test_field_1', 'test_field_2');
        $this->assertEquals(new GroupBy\Cube(['test_field_1', 'test_field_2']), $result);
    }

    public function testOrderBy()
    {
        $result = $this->factory->orderBy(['test_field_1', 'test_field_2'], OrderBy\Order::ASC(), OrderBy\Strategy::NULLS_FIRST());
        $this->assertEquals(
            new OrderBy\OrderBy(['test_field_1', 'test_field_2'], OrderBy\Order::ASC(), OrderBy\Strategy::NULLS_FIRST()),
            $result
        );
    }

    public function testTypeOf()
    {
        $result = $this->factory->typeof('test_field');
        $this->assertEquals(new Select\Typeof('test_field'), $result);
    }
}
