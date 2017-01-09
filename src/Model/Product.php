<?php

namespace Xsolve\SalesforceClient\Model;

use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\SObjectType;
use JMS\Serializer\Annotation as JMS;

class Product extends AbstractSObject
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $name;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $description;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $productCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $family;

    /**
     * @var bool
     * @JMS\Type("boolean")
     */
    protected $isDeleted;

    /**
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\Groups({"update"})
     */
    protected $isActive;

    /**
     * {@inheritdoc}
     */
    public static function getSObjectName(): AbstractSObjectType
    {
        return SObjectType::PRODUCT();
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @return string|null
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * @return bool
     */
    public function isDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->isActive;
    }

    public function setName(string $name): Product
    {
        $this->name = $name;

        return $this;
    }

    public function setDescription(string $description): Product
    {
        $this->description = $description;

        return $this;
    }

    public function setProductCode(string $code): Product
    {
        $this->productCode = $code;

        return $this;
    }

    public function setFamily(string $family): Product
    {
        $this->family = $family;

        return $this;
    }

    public function setActive(bool $isActive): Product
    {
        $this->isActive = $isActive;

        return $this;
    }
}
