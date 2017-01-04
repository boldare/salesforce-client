<?php

namespace Xsolve\SalesforceClient\Manager;

use Xsolve\SalesforceClient\Model\AbstractSObject;

interface SObjectManagerInterface
{
    public function create(AbstractSObject $object);

    public function update(AbstractSObject $object);

    public function delete(AbstractSObject $object);

    public function get(string $sObject, string $id) : AbstractSObject;

    public function getFields(string $sObject, string $id, array $fields = []) : AbstractSObject;
}
