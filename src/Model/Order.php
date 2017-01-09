<?php

namespace Xsolve\SalesforceClient\Model;

use JMS\Serializer\Annotation as JMS;
use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\SObjectType;
use Xsolve\SalesforceClient\Model\ValueObject\Address;

class Order extends AbstractSObject
{

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $ownerId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $contractId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $accountId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     * @JMS\SerializedName("Pricebook2Id")
     */
    protected $pricebookId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $originalOrderId;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\Groups({"update"})
     */
    protected $effectiveDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\Groups({"update"})
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
     * @JMS\Groups({"update"})
     */
    protected $status;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $description;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $customerAuthorizedById;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\Groups({"update"})
     */
    protected $customerAuthorizedDate;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $companyAuthorizedById;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\Groups({"update"})
     */
    protected $companyAuthorizedDate;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $type;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $billingStreet;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $billingCity;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $billingState;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $billingPostalCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $billingCountry;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update"})
     */
    protected $billingLatitude;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update"})
     */
    protected $billingLongitude;

    /**
     * @var Address|null
     * @JMS\Type("Xsolve\SalesforceClient\Model\ValueObject\Address")
     */
    protected $billingAddress;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $shippingStreet;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $shippingCity;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $shippingState;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $shippingPostalCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $shippingCountry;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update"})
     */
    protected $shippingLatitude;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update"})
     */
    protected $shippingLongitude;

    /**
     * @var Address|null
     * @JMS\Type("Xsolve\SalesforceClient\Model\ValueObject\Address")
     */
    protected $shippingAddress;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $name;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\Groups({"update"})
     */
    protected $poDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $poNumber;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $orderReferenceNumber;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $billToContactId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
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
     * @JMS\Groups({"update"})
     */
    protected $activatedById;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
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
     * @return string|null
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
     * @return Address|null
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @return Address|null
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
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
     * @return bool
     */
    public function isDeleted()
    {
        return $this->isDeleted;
    }

    public function setOwnerId(string $ownerId): Order
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function setContractId(string $contractId): Order
    {
        $this->contractId = $contractId;
        return $this;
    }

    public function setAccountId(string $accountId): Order
    {
        $this->accountId = $accountId;
        return $this;
    }

    public function setPricebookId(string $pricebookId): Order
    {
        $this->pricebookId = $pricebookId;
        return $this;
    }

    public function setOriginalOrderId(string $originalOrderId): Order
    {
        $this->originalOrderId = $originalOrderId;
        return $this;
    }

    public function setEffectiveDate(\DateTimeInterface $effectiveDate): Order
    {
        $this->effectiveDate = $effectiveDate;
        return $this;
    }

    public function setEndDate(\DateTimeInterface $endDate): Order
    {
        $this->endDate = $endDate;
        return $this;
    }

    public function setStatus(string $status): Order
    {
        $this->status = $status;
        return $this;
    }

    public function setDescription(string $description): Order
    {
        $this->description = $description;
        return $this;
    }

    public function setCustomerAuthorizedById(string $customerAuthorizedById): Order
    {
        $this->customerAuthorizedById = $customerAuthorizedById;
        return $this;
    }

    public function setCustomerAuthorizedDate(\DateTimeInterface $customerAuthorizedDate): Order
    {
        $this->customerAuthorizedDate = $customerAuthorizedDate;
        return $this;
    }

    public function setCompanyAuthorizedById(string $companyAuthorizedById): Order
    {
        $this->companyAuthorizedById = $companyAuthorizedById;
        return $this;
    }

    public function setCompanyAuthorizedDate(\DateTimeInterface $companyAuthorizedDate): Order
    {
        $this->companyAuthorizedDate = $companyAuthorizedDate;
        return $this;
    }

    public function setType(string $type): Order
    {
        $this->type = $type;
        return $this;
    }

    public function setBillingAddress(Address $billingAddress): Order
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    public function setShippingAddress(Address $shippingAddress): Order
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    public function setName(string $name): Order
    {
        $this->name = $name;
        return $this;
    }

    public function setPoDate(\DateTimeInterface $poDate): Order
    {
        $this->poDate = $poDate;
        return $this;
    }

    public function setPoNumber(string $poNumber): Order
    {
        $this->poNumber = $poNumber;
        return $this;
    }

    public function setOrderReferenceNumber(string $orderReferenceNumber): Order
    {
        $this->orderReferenceNumber = $orderReferenceNumber;
        return $this;
    }

    public function setBillToContactId(string $billToContactId): Order
    {
        $this->billToContactId = $billToContactId;
        return $this;
    }

    public function setShipToContactId(string $shipToContactId): Order
    {
        $this->shipToContactId = $shipToContactId;
        return $this;
    }

    public function setActivatedDate(\DateTimeInterface $activatedDate): Order
    {
        $this->activatedDate = $activatedDate;
        return $this;
    }

    public function setActivatedById(string $activatedById): Order
    {
        $this->activatedById = $activatedById;
        return $this;
    }

    public function setStatusCode(string $statusCode): Order
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function setLastViewedDate(\DateTimeInterface $lastViewedDate): Order
    {
        $this->lastViewedDate = $lastViewedDate;
        return $this;
    }

    public function setLastReferencedDate(\DateTimeInterface $lastReferencedDate): Order
    {
        $this->lastReferencedDate = $lastReferencedDate;
        return $this;
    }

    /**
     * Because BillingAddress is not writtable.
     *
     * @JMS\PreSerialize
     */
    public function updateBillingAddress()
    {
        if (!$this->shippingAddress instanceof Address) {
            return;
        }

        $this->billingCity = $this->billingAddress->getCity();
        $this->billingCountry = $this->billingAddress->getCountry();
        $this->billingLatitude = $this->billingAddress->getLatitude();
        $this->billingLongitude = $this->billingAddress->getLongitude();
        $this->billingPostalCode = $this->billingAddress->getPostalCode();
        $this->billingState = $this->billingAddress->getState();
        $this->billingStreet = $this->billingAddress->getStreet();
    }

    /**
     * Because ShippingAddress is not writable.
     *
     * @JMS\PreSerialize
     */
    public function updateShippingAddress()
    {
        if (!$this->shippingAddress instanceof Address) {
            return;
        }

        $this->shippingCity = $this->shippingAddress->getCity();
        $this->shippingCountry = $this->shippingAddress->getCountry();
        $this->shippingLatitude = $this->shippingAddress->getLatitude();
        $this->shippingLongitude = $this->shippingAddress->getLongitude();
        $this->shippingPostalCode = $this->shippingAddress->getPostalCode();
        $this->shippingState = $this->shippingAddress->getState();
        $this->shippingStreet = $this->shippingAddress->getStreet();
    }
}
