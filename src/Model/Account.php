<?php

namespace Xsolve\SalesforceClient\Model;

use JMS\Serializer\Annotation as JMS;
use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\SObjectType;

class Account extends AbstractSObject
{
    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isDeleted;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $masterRecordId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $name;

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
    protected $parentId;

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
     * @var string|null
     * @JMS\Type("Xsolve\SalesforceClient\Model\ValueObject\Address")
     */
    protected $billingAddress;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $shippingStreet;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $shippingCity;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $shippingState;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $shippingPostalCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $shippingCountry;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $shippingLatitude;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $shippingLongitude;

    /**
     * @var string|null
     * @JMS\Type("Xsolve\SalesforceClient\Model\ValueObject\Address")
     */
    protected $shippingAddress;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $phone;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $fax;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $accountNumber;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $website;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $photoUrl;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $sic;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $industry;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $annualRevenue;

    /**
     * @var int|null
     * @JMS\Type("int")
     * @JMS\Groups({"update", "create"})
     */
    protected $numberOfEmployees;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $ownership;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $tickerSymbol;

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
    protected $rating;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $site;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $ownerId;

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
     * @var \DateTime
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastReferencedDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $jigsaw;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $jigsawCompanyId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $cleanStatus;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $accountSource;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $dunsNumber;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $tradestyle;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $naicsCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $naicsDesc;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $yearStarted;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $sicDesc;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $dandbCompanyId;

    /**
     * {@inheritdoc}
     */
    public static function getSObjectName(): AbstractSObjectType
    {
        return SObjectType::ACCOUNT();
    }

    /**
     * @return bool
     */
    public function isDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * @return string|null
     */
    public function getMasterRecordId()
    {
        return $this->masterRecordId;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @return ValueObject\Address|null
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @return ValueObject\Address|null
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string|null
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @return string|null
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @return string|null
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @return string|null
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * @return string|null
     */
    public function getSic()
    {
        return $this->sic;
    }

    /**
     * @return string|null
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * @return string|null
     */
    public function getAnnualRevenue()
    {
        return $this->annualRevenue;
    }

    /**
     * @return int|null
     */
    public function getNumberOfEmployees()
    {
        return $this->numberOfEmployees;
    }

    /**
     * @return string|null
     */
    public function getOwnership()
    {
        return $this->ownership;
    }

    /**
     * @return string|null
     */
    public function getTickerSymbol()
    {
        return $this->tickerSymbol;
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
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @return string|null
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @return string|null
     */
    public function getOwnerId()
    {
        return $this->ownerId;
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

    /**
     * @return string|null
     */
    public function getJigsaw()
    {
        return $this->jigsaw;
    }

    /**
     * @return string|null
     */
    public function getJigsawCompanyId()
    {
        return $this->jigsawCompanyId;
    }

    /**
     * @return string|null
     */
    public function getCleanStatus()
    {
        return $this->cleanStatus;
    }

    /**
     * @return string|null
     */
    public function getAccountSource()
    {
        return $this->accountSource;
    }

    /**
     * @return string|null
     */
    public function getDunsNumber()
    {
        return $this->dunsNumber;
    }

    /**
     * @return string|null
     */
    public function getTradestyle()
    {
        return $this->tradestyle;
    }

    /**
     * @return string|null
     */
    public function getNaicsCode()
    {
        return $this->naicsCode;
    }

    /**
     * @return string|null
     */
    public function getNaicsDesc()
    {
        return $this->naicsDesc;
    }

    /**
     * @return string|null
     */
    public function getYearStarted()
    {
        return $this->yearStarted;
    }

    /**
     * @return string|null
     */
    public function getSicDesc()
    {
        return $this->sicDesc;
    }

    /**
     * @return string|null
     */
    public function getDandbCompanyId()
    {
        return $this->dandbCompanyId;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setType(string $type = null): self
    {
        $this->type = $type;

        return $this;
    }

    public function setParentId(string $parentId = null): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    public function setBillingAddress(ValueObject\Address $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function setShippingAddress(ValueObject\Address $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    public function setPhone(string $phone = null): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function setFax(string $fax = null): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function setAccountNumber(string $accountNumber = null): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    public function setWebsite(string $website = null): self
    {
        $this->website = $website;

        return $this;
    }

    public function setSic(string $sic = null): self
    {
        $this->sic = $sic;

        return $this;
    }

    public function setIndustry(string $industry = null): self
    {
        $this->industry = $industry;

        return $this;
    }

    public function setAnnualRevenue(string $annualRevenue = null): self
    {
        $this->annualRevenue = $annualRevenue;

        return $this;
    }

    public function setNumberOfEmployees(int $numberOfEmployees = null): self
    {
        $this->numberOfEmployees = $numberOfEmployees;

        return $this;
    }

    public function setOwnership(string $ownership = null): self
    {
        $this->ownership = $ownership;

        return $this;
    }

    public function setTickerSymbol(string $tickerSymbol = null): self
    {
        $this->tickerSymbol = $tickerSymbol;

        return $this;
    }

    public function setDescription(string $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    public function setRating(string $rating = null): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function setSite(string $site = null): self
    {
        $this->site = $site;

        return $this;
    }

    public function setOwnerId(string $ownerId): self
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function setLastActivityDate(\DateTimeInterface $lastActivityDate = null): self
    {
        $this->lastActivityDate = $lastActivityDate;

        return $this;
    }

    public function setLastViewedDate(\DateTimeInterface $lastViewedDate = null): self
    {
        $this->lastViewedDate = $lastViewedDate;

        return $this;
    }

    public function setLastReferencedDate(\DateTimeInterface $lastReferencedDate = null): self
    {
        $this->lastReferencedDate = $lastReferencedDate;

        return $this;
    }

    public function setJigsaw(string $jigsaw = null)
    {
        $this->jigsaw = $jigsaw;

        return $this;
    }

    public function setJigsawCompanyId(string $jigsawCompanyId = null): self
    {
        $this->jigsawCompanyId = $jigsawCompanyId;

        return $this;
    }

    public function setCleanStatus(string $cleanStatus = null): self
    {
        $this->cleanStatus = $cleanStatus;

        return $this;
    }

    public function setAccountSource(string $accountSource = null): self
    {
        $this->accountSource = $accountSource;

        return $this;
    }

    public function setDunsNumber(string $dunsNumber = null): self
    {
        $this->dunsNumber = $dunsNumber;

        return $this;
    }

    public function setTradestyle(string $tradestyle = null): self
    {
        $this->tradestyle = $tradestyle;

        return $this;
    }

    public function setNaicsCode(string $naicsCode = null): self
    {
        $this->naicsCode = $naicsCode;

        return $this;
    }

    public function setNaicsDesc(string $naicsDesc = null): self
    {
        $this->naicsDesc = $naicsDesc;

        return $this;
    }

    public function setYearStarted(string $yearStarted = null): self
    {
        $this->yearStarted = $yearStarted;

        return $this;
    }

    public function setSicDesc(string $sicDesc = null): self
    {
        $this->sicDesc = $sicDesc;

        return $this;
    }

    public function setDandbCompanyId(string $dandbCompanyId): self
    {
        $this->dandbCompanyId = $dandbCompanyId;

        return $this;
    }

    /**
     * Because BillingAddress is not writtable.
     *
     * @JMS\PreSerialize
     */
    public function updateBillingAddress()
    {
        if (!$this->shippingAddress instanceof ValueObject\Address) {
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
        if (!$this->shippingAddress instanceof ValueObject\Address) {
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
