<?php

namespace Xsolve\SalesforceClient\Model;

use JMS\Serializer\Annotation as JMS;
use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\SObjectType;
use Xsolve\SalesforceClient\Model\ValueObject\Address;

class Contract extends AbstractSObject
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $accountId;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("Pricebook2Id")
     * @JMS\Groups({"update"})
     */
    protected $pricebookId;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $ownerExpirationNotice;

    /**
     * @var \DateTimeInterface
     * @Type("DateTime<'Y-m-d'>")
     * @JMS\Groups({"update"})
     */
    protected $startDate;

    /**
     * Read-only. Calculated end date of the contract.
     * This value is calculated by adding the ContractTerm to the StartDate.
     *
     * @var \DateTimeInterface
     * @Type("DateTime<'Y-m-d'>")
     */
    protected $endDate;

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
     * @var int
     * @JMS\Type("integer")
     * @JMS\Groups({"update"})
     */
    protected $contractTerm;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $ownerId;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $status;

    /**
     * @var string
     * @JMS\Type("string")
     */
    protected $statusCode;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $companySignedId;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $customerSignedTitle;

    /**
     * @var \DateTimeInterface
     * @Type("DateTime<'Y-m-d'>")
     */
    protected $customerSignedDate;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $specialTerms;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $activatedById;

    /**
     * @var \DateTimeInterface
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $activatedDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $description;

    /**
     * @var bool
     * @JMS\Type("boolean")
     */
    protected $isDeleted;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update"})
     */
    protected $contractNumber;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastApprovedDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastActivityDate;

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
     * {@inheritdoc}
     */
    public static function getSObjectName(): AbstractSObjectType
    {
        return SObjectType::CONTRACT();
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
    public function getOwnerExpirationNotice()
    {
        return $this->ownerExpirationNotice;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return Address|null
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @return string|null
     */
    public function getContractTerm()
    {
        return $this->contractTerm;
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
    public function getStatus()
    {
        return $this->status;
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
    public function getCompanySignedId()
    {
        return $this->companySignedId;
    }

    /**
     * @return string|null
     */
    public function getCustomerSignedTitle()
    {
        return $this->customerSignedTitle;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCustomerSignedDate()
    {
        return $this->customerSignedDate;
    }

    /**
     * @return string|null
     */
    public function getSpecialTerms()
    {
        return $this->specialTerms;
    }

    /**
     * @return string|null
     */
    public function getActivatedById()
    {
        return $this->activatedById;
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
    public function getDescription()
    {
        return $this->description;
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
    public function getContractNumber()
    {
        return $this->contractNumber;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLastApprovedDate()
    {
        return $this->lastApprovedDate;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLastActivityDate()
    {
        return $this->lastActivityDate;
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

    public function setAccountId(string $accountId): Contract
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function setPricebookId(string $pricebookId): Contract
    {
        $this->pricebookId = $pricebookId;

        return $this;
    }

    public function setOwnerExpirationNotice(string $ownerExpirationNotice): Contract
    {
        $this->ownerExpirationNotice = $ownerExpirationNotice;

        return $this;
    }

    public function setStartDate(\DateTimeInterface $startDate): Contract
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function setEndDate(\DateTimeInterface $endDate): Contract
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function setBillingAddress(Address $billingAddress): Contract
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function setContractTerm(int $contractTerm): Contract
    {
        $this->contractTerm = $contractTerm;

        return $this;
    }

    public function setOwnerId(string $ownerId): Contract
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function setStatus(string $status): Contract
    {
        $this->status = $status;

        return $this;
    }

    public function setCompanySignedId(string $companySignedId): Contract
    {
        $this->companySignedId = $companySignedId;

        return $this;
    }

    public function setCustomerSignedTitle(string $customerSignedTitle): Contract
    {
        $this->customerSignedTitle = $customerSignedTitle;

        return $this;
    }

    public function setCustomerSignedDate(\DateTimeInterface $customerSignedDate): Contract
    {
        $this->customerSignedDate = $customerSignedDate;

        return $this;
    }

    public function setSpecialTerms(string $specialTerms): Contract
    {
        $this->specialTerms = $specialTerms;

        return $this;
    }

    public function setActivatedById(string $activatedById): Contract
    {
        $this->activatedById = $activatedById;

        return $this;
    }

    public function setActivatedDate(\DateTimeInterface $activatedDate): Contract
    {
        $this->activatedDate = $activatedDate;

        return $this;
    }

    public function setDescription(string $description): Contract
    {
        $this->description = $description;

        return $this;
    }

    public function setContractNumber(string $contractNumber): Contract
    {
        $this->contractNumber = $contractNumber;

        return $this;
    }

    public function setLastApprovedDate(\DateTimeInterface $lastApprovedDate): Contract
    {
        $this->lastApprovedDate = $lastApprovedDate;

        return $this;
    }

    public function setLastActivityDate(\DateTimeInterface $lastActivityDate): Contract
    {
        $this->lastActivityDate = $lastActivityDate;

        return $this;
    }

    public function setLastViewedDate(\DateTimeInterface $lastViewedDate): Contract
    {
        $this->lastViewedDate = $lastViewedDate;

        return $this;
    }

    public function setLastReferencedDate(\DateTimeInterface $lastReferencedDate): Contract
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
}
