<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Select;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;

class MultipleGrouping extends AbstractSelect implements ExprInterface
{
    /**
     * @var Grouping[]
     */
    protected $groupings;

    public function __construct(array $groupings)
    {
        $this->groupings = $groupings;
    }

    /**
     * {@inheritdoc}
     */
    protected function getSelectPart(): string
    {
        $result = [];

        foreach ($this->groupings as $group) {
            $result[] = $group->asSOQL();
        }

        return implode(', ', $result);
    }
}
