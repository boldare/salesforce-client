<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Select;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;
use Xsolve\SalesforceClient\QueryBuilder\Query;

class Inner extends AbstractSelect implements ExprInterface
{
    /**
     * @var AbstractSelect
     */
    private $innerQuery;

    public function __construct(Query $query)
    {
        $this->innerQuery = $query;
    }

    protected function getSelectPart(): string
    {
        return sprintf('(%s)', (string) $this->innerQuery);
    }
}
