<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

class BoolReplacingStrategy implements ReplacingStrategyInterface
{
    public function isApplicable(Type $type): bool
    {
        return Type::BOOL() === $type;
    }

    public function replace($value): string
    {
        if (in_array($value, ['true', 'false'], true)) {
            return $value;
        }

        $boolValue = (bool) $value;

        return $boolValue ? 'true' : 'false';
    }
}
