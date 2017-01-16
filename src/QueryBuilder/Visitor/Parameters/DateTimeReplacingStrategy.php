<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

class DateTimeReplacingStrategy implements ReplacingStrategyInterface
{
    public function isApplicable(Type $type): bool
    {
        return Type::DATETIME() === $type;
    }

    public function replace($value): string
    {
        if (is_int($value)) {
            $value = sprintf('@%d', $value);
        }

        if (!$value  instanceof \DateTimeInterface) {
            $value = new \DateTime($value);
        }

        return $value->format('c');
    }
}
