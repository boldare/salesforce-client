<?php

namespace Xsolve\SalesforceClient\Serializer;

use JMS\Serializer\Metadata\PropertyMetadata;
use PHPUnit\Framework\TestCase;

class CamelCaseNamingStrategyTest extends TestCase
{
    /**
     * @var CamelCaseNamingStrategy
     */
    private $strategy;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->strategy = new CamelCaseNamingStrategy();
    }

    /**
     * @dataProvider propertyNameProvider
     */
    public function testTranslateName(string $propertyName, string $expectedName)
    {
        $metadata = $this->prophesize(PropertyMetadata::class);
        $metadata->name = $propertyName;

        $this->assertSame($expectedName, $this->strategy->translateName($metadata->reveal()));
    }

    /**
     * @return array
     */
    public function propertyNameProvider()
    {
        return [
            ['', ''],
            ['test', 'Test'],
            ['testPropertyName', 'TestPropertyName'],
        ];
    }
}
