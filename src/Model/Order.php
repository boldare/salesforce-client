<?php

namespace Xsolve\SalesforceClient\Model;

use JMS\Serializer\Annotation as JMS;
use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\SObjectType;

class Order extends AbstractSObject
{
    use BillingAddressTrait;
    use ShippingAddressTrait;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $ownerId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $contractId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $accountId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     * @JMS\SerializedName("Pricebook2Id")
     */
    protected $pricebookId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create"})
     */
    protected $originalOrderId;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\Groups({"update", "create"})
     */
    protected $effectiveDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\Groups({"update", "create"})
     */
    protected $endDate;

    /**
     * @var bool
     * @JMS\Type("boolean")
     */
    protected $isReductionOrder;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $status;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $description;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $customerAuthorizedById;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\Groups({"update", "create"})
     */
    protected $customerAuthorizedDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $companyAuthorizedById;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\Groups({"update", "create"})
     */
    protected $companyAuthorizedDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $type;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $name;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\Groups({"update", "create"})
     */
    protected $poDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $poNumber;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $orderReferenceNumber;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $billToContactId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $shipToContactId;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $activatedDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $activatedById;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $statusCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $orderNumber;

    /**
     * @var float|null
     * @JMS\Type("float")
     */
    protected $totalAmount;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastViewedDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastReferencedDate;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isDeleted;

    /**
     * {@inheritdoc}
     */
    public static function getSObjectName(): AbstractSObjectType
    {
        return SObjectType::ORDER();
    }

    /**
     * @return string|null
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * @return string|null
     */
    public function getContractId()
    {
        return $this->contractId;
    }

    /**
     * @return string|null
     */
    public function getAccountId()
    {
        return $this->accountId;
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
    public function getOriginalOrderId()
    {
        return $this->originalOrderId;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEffectiveDate()
    {
        return $this->effectiveDate;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return bool
     */
    public function getIsReductionOrder()
    {
        return $this->isReductionOrder;
    }

    /**
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
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
    public function getCustomerAuthorizedById()
    {
        return $this->customerAuthorizedById;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCustomerAuthorizedDate()
    {
        return $this->customerAuthorizedDate;
    }

    /**
     * @return string|null
     */
    public function getCompanyAuthorizedById()
    {
        return $this->companyAuthorizedById;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCompanyAuthorizedDate()
    {
        return $this->companyAuthorizedDate;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getPoDate()
    {
        return $this->poDate;
    }

    /**
     * @return string|null
     */
    public function getPoNumber()
    {
        return $this->poNumber;
    }

    /**
     * @return string|null
     */
    public function getOrderReferenceNumber()
    {
        return $this->orderReferenceNumber;
    }

    /**
     * @return string|null
     */
    public function getBillToContactId()
    {
        return $this->billToContactId;
    }

    /**
     * @return string|null
     */
    public function getShipToContactId()
    {
        return $this->shipToContactId;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getActivatedDate()
    {
        return $this->activatedDate;
    }

    /**
     * @return string|null
     */
    public function getActivatedById()
    {
        return $this->activatedById;
    }

    /**
     * @return string|null
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return string|null
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @return float|null
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLastViewedDate()
    {
        return $this->lastViewedDate;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLastReferencedDate()
    {
        return $this->lastReferencedDate;
    }

    /**
     * @return bool|null
     */
    public function isDeleted()
    {
        return $this->isDeleted;
    }

    public function setOwnerId(string $ownerId): self
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function setContractId(string $contractId = null): self
    {
        $this->contractId = $contractId;

        return $this;
    }

    public function setAccountId(string $accountId = null): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function setPricebookId(string $pricebookId = null): self
    {
        $this->pricebookId = $pricebookId;

        return $this;
    }

    public function setOriginalOrderId(string $originalOrderId = null): self
    {
        $this->originalOrderId = $originalOrderId;

        return $this;
    }

    public function setEffectiveDate(\DateTimeInterface $effectiveDate): self
    {
        $this->effectiveDate = $effectiveDate;

        return $this;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function setDescription(string $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    public function setCustomerAuthorizedById(string $customerAuthorizedById = null): self
    {
        $this->customerAuthorizedById = $customerAuthorizedById;

        return $this;
    }

    public function setCustomerAuthorizedDate(\DateTimeInterface $customerAuthorizedDate = null): self
    {
        $this->customerAuthorizedDate = $customerAuthorizedDate;

        return $this;
    }

    public function setCompanyAuthorizedById(string $companyAuthorizedById = null): self
    {
        $this->companyAuthorizedById = $companyAuthorizedById;

        return $this;
    }

    public function setCompanyAuthorizedDate(\DateTimeInterface $companyAuthorizedDate = null): self
    {
        $this->companyAuthorizedDate = $companyAuthorizedDate;

        return $this;
    }

    public function setType(string $type = null): self
    {
        $this->type = $type;

        return $this;
    }

    public function setName(string $name = null): self
    {
        $this->name = $name;

        return $this;
    }

    public function setPoDate(\DateTimeInterface $poDate = null): self
    {
        $this->poDate = $poDate;

        return $this;
    }

    public function setPoNumber(string $poNumber = null): self
    {
        $this->poNumber = $poNumber;

        return $this;
    }

    public function setOrderReferenceNumber(string $orderReferenceNumber = null): self
    {
        $this->orderReferenceNumber = $orderReferenceNumber;

        return $this;
    }

    public function setBillToContactId(string $billToContactId = null): self
    {
        $this->billToContactId = $billToContactId;

        return $this;
    }

    public function setShipToContactId(string $shipToContactId = null): self
    {
        $this->shipToContactId = $shipToContactId;

        return $this;
    }

    public function setActivatedDate(\DateTimeInterface $activatedDate = null): self
    {
        $this->activatedDate = $activatedDate;

        return $this;
    }

    public function setActivatedById(string $activatedById = null): self
    {
        $this->activatedById = $activatedById;

        return $this;
    }

    public function setStatusCode(string $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }
}
