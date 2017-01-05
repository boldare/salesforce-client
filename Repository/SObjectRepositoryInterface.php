<?php

namespace Xsolve\SalesforceClient\Repository;

use Xsolve\SalesforceClient\Model\AbstractSObject;

interface SObjectRepositoryInterface
{
    public function create(AbstractSObject $object);

    public function update(AbstractSObject $object);

    public function delete(AbstractSObject $object);

    public function find(string $class, string $id): AbstractSObject;

    public function getFieldValues(string $class, string $id, array $fields = []): array;
}
