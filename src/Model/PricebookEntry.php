<?php

namespace Xsolve\SalesforceClient\Model;

use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\SObjectType;
use JMS\Serializer\Annotation as JMS;

class PricebookEntry extends AbstractSObject
{
    /**
     * @var bool|null
     * @JMS\Type("boolean")
     * @JMS\Groups({"update", "create"})
     */
    protected $isActive;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isDeleted;

    /**
     * Name of this PricebookEntry record.
     * This read-only field references the value in the Name field of the Product2 record.
     *
     * @var string|null
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create"})
     * @JMS\SerializedName("Pricebook2Id")
     */
    protected $pricebookId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create"})
     * @JMS\SerializedName("Product2Id")
     */
    protected $productId;

    /**
     * This read-only field references the value in the ProductCode field of the associated Product2 record.
     *
     * @var string|null
     * @JMS\Type("string")
     */
    protected $productCode;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $unitPrice;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     * @JMS\Groups({"update", "create"})
     */
    protected $useStandardPrice;

    /**
     * {@inheritdoc}
     */
    public static function getSObjectName(): AbstractSObjectType
    {
        return SObjectType::PRICEBOOK_ENTRY();
    }

    /**
     * @return bool|null
     */
    public function isActive()
    {
        return $this->isActive;
    }

    /**
     * @return bool|null
     */
    public function isDeleted()
    {
        return $this->isDeleted;
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
    public function getPricebookId()
    {
        return $this->pricebookId;
    }

    /**
     * @return string|null
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return string|null
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * @return float|null
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @return bool|null
     */
    public function getUseStandardPrice()
    {
        return $this->useStandardPrice;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function setPricebookId(string $pricebook2Id): self
    {
        $this->pricebookId = $pricebook2Id;

        return $this;
    }

    public function setProductId(string $product2Id): self
    {
        $this->productId = $product2Id;

        return $this;
    }

    public function setUnitPrice(float $unitPrice): self
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function setUseStandardPrice(bool $useStandardPrice): self
    {
        $this->useStandardPrice = $useStandardPrice;

        return $this;
    }
}
