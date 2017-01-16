<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

class FloatReplacingStrategy implements ReplacingStrategyInterface
{
    public function isApplicable(Type $type): bool
    {
        return Type::FLOAT() === $type;
    }

    public function replace($value): string
    {
        return (string) floatval($value);
    }
}
