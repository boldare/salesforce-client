<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

class DateTimeReplacingStrategyTest extends AbstractReplacingStrategyTest
{
    protected function createStrategy(): ReplacingStrategyInterface
    {
        return new DateTimeReplacingStrategy();
    }

    protected function getApplicableType(): Type
    {
        return Type::DATETIME();
    }

    public function replaceValuesProvider(): array
    {
        return [
            [1484575327, '2017-01-16T14:02:07+00:00'],
            [new \DateTime('@1484575327'), '2017-01-16T14:02:07+00:00'],
            ['2017-01-16T14:02:07+00:00', '2017-01-16T14:02:07+00:00'],
        ];
    }
}
