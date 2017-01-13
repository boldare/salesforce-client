<?php

require_once __DIR__.'/../../vendor/autoload.php';

use Doctrine\Common\Annotations\AnnotationRegistry;
use Xsolve\SalesforceClient\Enum\SObjectType;
use Xsolve\SalesforceClient\Enum\Status;
use Xsolve\SalesforceClient\QueryBuilder\Expr\ExpressionFactory;
use Xsolve\SalesforceClient\QueryBuilder\QueryBuilder;

AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__.'/vendor/jms/serializer/src'
);

$e = new ExpressionFactory();

$innerQuery = (new QueryBuilder())
    ->select($e->count())
    ->from($e->objectType(SObjectType::ORDER()))
    ->where($e->in('Status', ['{firstStatus}', '{secondStatus}']))
    ->andWhere($e->notEquals('Id', '{someId}'))
    ->setParameters([
        'firstStatus' => Status::INACTIVE()->value(),
        'secondStatus' => Status::SKIPPED()->value(),
        'someId' => 321,
    ]);

$res = (new QueryBuilder())
    ->select(
        $e->fields(['Id', 'Name']),
        $e->count('Id'),
        $e->inner($innerQuery->getQuery())
    )
    ->from($e->objectType(SObjectType::LEAD()))
    ->where($e->equals('Id', '{leadId}'))
    ->having($e->in('Name', ['Cokolwiek', 'Jeszcze', 'Tu', 'Może', 'Byc']))
    ->orHaving($e->like('Name', 'Cokolwiek'))
    ->groupBy($e->groupBy('Name'))
    ->setParameters(['leadId' => 123])
    ->getQuery();

var_dump($res->parse());die;

