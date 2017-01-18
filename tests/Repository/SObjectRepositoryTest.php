<?php

use JMS\Serializer\ArrayTransformerInterface;
use JMS\Serializer\SerializationContext;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use Xsolve\SalesforceClient\Client\SalesforceClient;
use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\SObjectType;
use Xsolve\SalesforceClient\Mock\Model\SObjectMock;
use Xsolve\SalesforceClient\Repository\SObjectRepository;
use Xsolve\SalesforceClient\Request\Create;
use Xsolve\SalesforceClient\Request\Delete;
use Xsolve\SalesforceClient\Request\Get;
use Xsolve\SalesforceClient\Request\Update;

class SObjectRepositoryTest extends TestCase
{
    /**
     * @var SObjectRepository
     */
    private $repository;

    /**
     * @var ObjectProphecy|SalesforceClient
     */
    private $client;

    /**
     * @var ObjectProphecy|ArrayTransformerInterface
     */
    private $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->client = $this->prophesize(SalesforceClient::class);
        $this->serializer = $this->prophesize(ArrayTransformerInterface::class);
        $this->repository = new SObjectRepository($this->client->reveal(), $this->serializer->reveal());
    }

    public function testCreate()
    {
        $object = $this->createSObjectMock(SObjectType::ACCOUNT());

        $this->serializer->toArray($object, Argument::type(SerializationContext::class))
            ->willReturn(['test serialized SObject']);
        $this->client->doRequest(Argument::type(Create::class))->willReturn(['success' => true, 'id' => 'test_id']);

        $this->repository->create($object);
        $this->assertSame('test_id', $object->getId());
    }

    public function testCreateUnsuccessfulResponse()
    {
        $object = $this->createSObjectMock(SObjectType::ACCOUNT());

        $this->serializer->toArray($object, Argument::type(SerializationContext::class))
            ->willReturn(['test serialized SObject']);
        $this->client->doRequest(Argument::type(Create::class))->willReturn(['success' => false]);

        $this->repository->create($object);
        $this->assertNull($object->getId());
    }

    public function testDelete()
    {
        $object = $this->createSObjectMock(SObjectType::ACCOUNT());
        $object->setId('test id');

        $this->client->doRequest(Argument::type(Delete::class))->shouldBeCalled();

        $this->repository->delete($object);
    }

    public function testUpdate()
    {
        $object = $this->createSObjectMock(SObjectType::ACCOUNT());
        $object->setId('test id');

        $this->serializer->toArray($object, Argument::type(SerializationContext::class))
            ->willReturn(['test serialized SObject']);
        $this->client->doRequest(Argument::type(Update::class))->shouldBeCalled();

        $this->repository->update($object);
    }

    public function testFind()
    {
        $object = new SObjectMock();
        $this->client->doRequest(Argument::type(Get::class))->willReturn(['result']);
        $this->serializer->fromArray(['result'], SObjectMock::class)->willReturn($object);

        $this->assertSame($object, $this->repository->find(SObjectMock::class, 'test id'));
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testFindUnsupported()
    {
        $this->repository->find(stdClass::class, 'test id');
    }

    private function createSObjectMock(AbstractSObjectType $type): SObjectMock
    {
        $object = new SObjectMock();
        $object::setSObjectName($type);

        return $object;
    }
}
