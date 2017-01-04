<?php

namespace Xsolve\SalesforceClient\Enum;

final class Rating
{
    const HOT = 'Hot';
    const WARM = 'Warm';
    const COLD = 'Cold';

    private function __construct()
    {
    }

    public function getRatings() : array
    {
        return [
            self::COLD,
            self::WARM,
            self::HOT,
        ];
    }
}
