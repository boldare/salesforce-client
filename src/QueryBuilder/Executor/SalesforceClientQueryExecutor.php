<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Executor;

use Xsolve\SalesforceClient\Client\SalesforceClient;
use Xsolve\SalesforceClient\QueryBuilder\Query;
use Xsolve\SalesforceClient\QueryBuilder\Records;
use Xsolve\SalesforceClient\Request\Query as RequestQuery;
use Xsolve\SalesforceClient\Request\QueryNext;

class SalesforceClientQueryExecutor implements QueryExecutorInterface
{
    /**
     * @var SalesforceClient
     */
    private $client;

    public function __construct(SalesforceClient $client)
    {
        $this->client = $client;
    }

    public function getRecords(Query $query): Records
    {
        $request = new RequestQuery($query->parse());
        $result = $this->client->doRequest($request);

        return new Records($result);
    }

    /**
     * @param Records $records
     *
     * @return Records|null
     */
    public function getNextRecords(Records $records)
    {
        if (!$records->hasNext()) {
            return;
        }

        $request = new QueryNext($records->getNextIdentifier());
        $nextResult = $this->client->doRequest($request);

        return new Records($nextResult);
    }
}
