<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

class StringReplacingStrategy implements ReplacingStrategyInterface
{
    public function isApplicable(Type $type): bool
    {
        return Type::STRING() === $type;
    }

    public function replace($value): string
    {
        return sprintf('\'%s\'', str_replace(['\\', '\''], ['\\\\\\', '\\\''], $value));
    }
}
