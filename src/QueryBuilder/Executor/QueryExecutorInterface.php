<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Executor;

use Xsolve\SalesforceClient\QueryBuilder\Query;
use Xsolve\SalesforceClient\QueryBuilder\Records;

interface QueryExecutorInterface
{
    public function getRecords(Query $query): Records;

    /**
     * @param Records $records
     *
     * @return Records|null when there is no next records for given set
     */
    public function getNextRecords(Records $records);
}
