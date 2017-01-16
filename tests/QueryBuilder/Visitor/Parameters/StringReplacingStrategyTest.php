<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

class StringReplacingStrategyTest extends AbstractReplacingStrategyTest
{
    protected function createStrategy(): ReplacingStrategyInterface
    {
        return new StringReplacingStrategy();
    }

    protected function getApplicableType(): Type
    {
        return Type::STRING();
    }

    public function replaceValuesProvider(): array
    {
        return [
            [null, '\'\''],
            ['some value', '\'some value\''],
            [123, '\'123\''],
            [true, '\'1\''],
            [false, '\'\''],
        ];
    }
}
