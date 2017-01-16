<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

class FloatReplacingStrategyTest extends AbstractReplacingStrategyTest
{
    protected function createStrategy(): ReplacingStrategyInterface
    {
        return new FloatReplacingStrategy();
    }

    protected function getApplicableType(): Type
    {
        return Type::FLOAT();
    }

    public function replaceValuesProvider(): array
    {
        return [
            [123, '123'],
            [123.01, '123.01'],
            [123.0123456789, '123.0123456789'],
            [-123, '-123'],
            [-123.01, '-123.01'],
            [-123.0123456789, '-123.0123456789'],
        ];
    }
}
