<?php

namespace Xsolve\SalesforceClient\Manager;

use JMS\Serializer\ {
    ArrayTransformerInterface,
    SerializationContext
};
use Xsolve\SalesforceClient\ {
    Client\SalesforceClient,
    Manager\SObjectManagerInterface,
    Model\AbstractSObject,
    Request\Create,
    Request\Delete,
    Request\Get,
    Request\Update
};

class SObjectManager implements SObjectManagerInterface
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

    public function delete(AbstractSObject $object)
    {
        $this->client->doRequest(new Delete($object::getSObjectName(), $object->getId()));
    }

    public function update(AbstractSObject $object)
    {
        $this->client->doRequest(new Update(
            $object::getSObjectName(),
            $object->getId(),
            $this->serializer->toArray($object, SerializationContext::create()->setGroups(['update']))
        ));
    }

    public function get(string $sObject, string $id) : AbstractSObject
    {
        return $this->getFields($sObject, $id);
    }

    public function getFields(string $sObject, string $id, array $fields = []) : AbstractSObject
    {
        if (!method_exists($sObject, 'getSObjectName')) {
            throw new \RuntimeException(sprintf('%s should extend %s or contains static method "getSObjectName"', $sObject, AbstractSObject::class));
        }

        $response = $this->client->doRequest(new Get($sObject::getSObjectName(), $id, $fields));

        return $this->serializer->fromArray($response, $sObject);
    }
}
