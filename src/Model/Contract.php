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
     * @JMS\Groups({"update", "create"})
     */
    protected $accountId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("Pricebook2Id")
     * @JMS\Groups({"update", "create"})
     */
    protected $pricebookId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $ownerExpirationNotice;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\Groups({"update", "create"})
     */
    protected $startDate;

    /**
     * Read-only. Calculated end date of the contract.
     * This value is calculated by adding the ContractTerm to the StartDate.
     *
     * @var \DateTimeInterface
     * @JMS\Type("DateTime<'Y-m-d'>")
     */
    protected $endDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $billingStreet;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $billingCity;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $billingState;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $billingPostalCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $billingCountry;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $billingLatitude;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $billingLongitude;

    /**
     * @var Address|null
     * @JMS\Type("Xsolve\SalesforceClient\Model\ValueObject\Address")
     */
    protected $billingAddress;

    /**
     * @var int|null
     * @JMS\Type("integer")
     * @JMS\Groups({"update", "create"})
     */
    protected $contractTerm;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $ownerId;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $status;

    /**
     * @var string
     * @JMS\Type("string")
     */
    protected $statusCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $companySignedId;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $companySignedDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $customerSignedId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $customerSignedTitle;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d'>")
     */
    protected $customerSignedDate;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $specialTerms;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
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
     * @JMS\Groups({"update", "create"})
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
     * @return int|null
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

    public function setAccountId(string $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function setPricebookId(string $pricebookId = null): self
    {
        $this->pricebookId = $pricebookId;

        return $this;
    }

    public function setOwnerExpirationNotice(string $ownerExpirationNotice = null): self
    {
        $this->ownerExpirationNotice = $ownerExpirationNotice;

        return $this;
    }

    public function setStartDate(\DateTimeInterface $startDate = null): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function setBillingAddress(Address $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function setContractTerm(int $contractTerm = null): self
    {
        $this->contractTerm = $contractTerm;

        return $this;
    }

    public function setOwnerId(string $ownerId): self
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function setCompanySignedId(string $companySignedId = null): self
    {
        $this->companySignedId = $companySignedId;

        return $this;
    }

    public function setCompanySignedDate(\DateTimeInterface $companySignedDate = null): self
    {
        $this->companySignedDate = $companySignedDate;

        return $this;
    }

    public function setCustomerSignedId(string $customerSignedId = null): self
    {
        $this->customerSignedId = $customerSignedId;

        return $this;
    }

    public function setCustomerSignedTitle(string $customerSignedTitle = null): self
    {
        $this->customerSignedTitle = $customerSignedTitle;

        return $this;
    }

    public function setCustomerSignedDate(\DateTimeInterface $customerSignedDate = null): self
    {
        $this->customerSignedDate = $customerSignedDate;

        return $this;
    }

    public function setSpecialTerms(string $specialTerms): self
    {
        $this->specialTerms = $specialTerms;

        return $this;
    }

    public function setActivatedById(string $activatedById): self
    {
        $this->activatedById = $activatedById;

        return $this;
    }

    public function setActivatedDate(\DateTimeInterface $activatedDate): self
    {
        $this->activatedDate = $activatedDate;

        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function setLastApprovedDate(\DateTimeInterface $lastApprovedDate): self
    {
        $this->lastApprovedDate = $lastApprovedDate;

        return $this;
    }

    public function setLastActivityDate(\DateTimeInterface $lastActivityDate): self
    {
        $this->lastActivityDate = $lastActivityDate;

        return $this;
    }

    public function setLastViewedDate(\DateTimeInterface $lastViewedDate): self
    {
        $this->lastViewedDate = $lastViewedDate;

        return $this;
    }

    public function setLastReferencedDate(\DateTimeInterface $lastReferencedDate): self
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
        if (!$this->billingAddress instanceof Address) {
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
