<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

class BoolReplacingStrategyTest extends AbstractReplacingStrategyTest
{
    protected function createStrategy(): ReplacingStrategyInterface
    {
        return new BoolReplacingStrategy();
    }

    protected function getApplicableType(): Type
    {
        return Type::BOOL();
    }

    public function replaceValuesProvider(): array
    {
        return [
            [1, 'true'],
            [0, 'false'],
            [true, 'true'],
            [false, 'false'],
            ['true', 'true'],
            ['false', 'false'],
        ];
    }
}
