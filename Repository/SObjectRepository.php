<?php

namespace Xsolve\SalesforceClient\Repository;

use JMS\Serializer\ {
    ArrayTransformerInterface,
    SerializationContext
};
use Xsolve\SalesforceClient\ {
    Client\SalesforceClient,
    Model\AbstractSObject,
    Repository\SObjectRepositoryInterface,
    Request\Object\Create,
    Request\Object\Delete,
    Request\Object\Get,
    Request\Object\Update
};


class SObjectRepository implements SObjectRepositoryInterface
{
    /**
     * @var SalesforceClient
     */
    protected $client;

    /**
     * @var ArrayTransformerInterface
     */
    protected $serializer;

    public function __construct(SalesforceClient $client, ArrayTransformerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * {@inheritdoc}
     */
    public function create(AbstractSObject $object)
    {
        $response = $this->client->doRequest(new Create(
            $object::getSObjectName(),
            $this->serializer->toArray($object, SerializationContext::create()->setGroups(['update']))
        ));

        if (!$response['success']) {
            return;
        }

        $object->setId($response['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function delete(AbstractSObject $object)
    {
        $this->client->doRequest(new Delete($object::getSObjectName(), $object->getId()));
    }

    /**
     * {@inheritdoc}
     */
    public function update(AbstractSObject $object)
    {
        $this->client->doRequest(new Update(
            $object::getSObjectName(),
            $object->getId(),
            $this->serializer->toArray($object, SerializationContext::create()->setGroups(['update']))
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function find(string $class, string $id): AbstractSObject
    {
        return $this->serializer->fromArray(
            $this->getFieldValues($class, $id),
            $class
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getFieldValues(string $class, string $id, array $fields = array()): array
    {
        if (!method_exists($class, 'getSObjectName')) {
            throw new \RuntimeException(sprintf('%s should extend %s or contains static method "getSObjectName"', $class, AbstractSObject::class));
        }

        return $this->client->doRequest(new Get($class::getSObjectName(), $id, $fields));
    }
}
