<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

use PHPUnit\Framework\TestCase;

class ReplacingStrategyCollectionTest extends TestCase
{
    /**
     * @var ReplacingStrategyCollection
     */
    private $collection;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->collection = new ReplacingStrategyCollection();
    }

    public function testOffsetExistsDefault()
    {
        $this->assertFalse(isset($this->collection[0]));
        $this->assertTrue(isset($this->collection[null]));
    }

    /**
     * @dataProvider typesProvider
     */
    public function testOffsetExists(Type $type)
    {
        $this->assertTrue(isset($this->collection[$type]));
    }

    public function testOffsetGetDefault()
    {
        $this->assertInstanceOf(ReplacingStrategyInterface::class, $this->collection[null]);
    }

    /**
     * @dataProvider typesProvider
     */
    public function testOffsetGet(Type $type)
    {
        $this->assertInstanceOf(ReplacingStrategyInterface::class, $this->collection[$type]);
    }

    /**
     * @dataProvider typesProvider
     */
    public function testOffsetSetUnset(Type $type)
    {
        unset($this->collection[$type]);
        $this->assertFalse(isset($this->collection[$type]));
        $strategy = $this->prophesize(ReplacingStrategyInterface::class);
        $strategy->isApplicable($type)->willReturn(true);
        $this->collection[] = $strategy->reveal();
        $this->assertTrue(isset($this->collection[$type]));
        $this->assertSame($strategy->reveal(), $this->collection[$type]);
    }

    public function typesProvider(): array
    {
        return array_map(function (Type $type) {
            return [$type];
        }, Type::members());
    }
}
