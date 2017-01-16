<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

use PHPUnit\Framework\TestCase;

abstract class AbstractReplacingStrategyTest extends TestCase
{
    /**
     * @var ReplacingStrategyInterface
     */
    private $strategy;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->strategy = $this->createStrategy();
    }

    public function testIsApplicable()
    {
        $this->assertTrue($this->strategy->isApplicable($this->getApplicableType()));

        foreach (Type::members() as $type) {
            if ($type !== $this->getApplicableType()) {
                $this->assertFalse($this->strategy->isApplicable($type));
            }
        }
    }

    /**
     * @dataProvider replaceValuesProvider
     */
    public function testReplace($value, string $expected)
    {
        $this->assertSame($expected, $this->strategy->replace($value));
    }

    abstract protected function createStrategy(): ReplacingStrategyInterface;

    abstract protected function getApplicableType(): Type;

    abstract public function replaceValuesProvider(): array;
}
