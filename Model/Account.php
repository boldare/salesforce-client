<?php

namespace Xsolve\SalesforceClient\Model;

use JMS\Serializer\Annotation\ {
    Groups,
    PreSerialize,
    Type
};
use Xsolve\SalesforceClient\Enum\ {
    AbstractSObjectType,
    SObjectType
};

class Account extends AbstractSObject
{
    /**
     * @var bool
     * @Type("boolean")
     */
    protected $isDeleted;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $masterRecordId;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $name;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $type;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $parentId;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $billingStreet;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $billingCity;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $billingState;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $billingPostalCode;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $billingCountry;

    /**
     * @var float|null
     * @Type("float")
     * @Groups({"update"})
     */
    protected $billingLatitude;

    /**
     * @var float|null
     * @Type("float")
     * @Groups({"update"})
     */
    protected $billingLongitude;

    /**
     * @var string|null
     * @Type("Xsolve\SalesforceClient\Model\Address")
     */
    protected $billingAddress;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $shippingStreet;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $shippingCity;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $shippingState;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $shippingPostalCode;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $shippingCountry;

    /**
     * @var float|null
     * @Type("float")
     * @Groups({"update"})
     */
    protected $shippingLatitude;

    /**
     * @var float|null
     * @Type("float")
     * @Groups({"update"})
     */
    protected $shippingLongitude;

    /**
     * @var string|null
     * @Type("Xsolve\SalesforceClient\Model\Address")
     * @Groups({"update"})
     */
    protected $shippingAddress;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $phone;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $fax;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $accountNumber;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $website;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $photoUrl;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $sic;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $industry;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $annualRevenue;

    /**
     * @var int|null
     * @Type("int")
     * @Groups({"update"})
     */
    protected $numberOfEmployees;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $ownership;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $tickerSymbol;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $description;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $rating;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $site;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $ownerId;

    /**
     * @var \DateTime
     * @Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastActivityDate;

    /**
     * @var \DateTime
     * @Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastViewedDate;

    /**
     * @var \DateTime
     * @Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastReferencedDate;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $jigsaw;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $jigsawCompanyId;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $cleanStatus;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $accountSource;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $dunsNumber;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $tradestyle;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $naicsCode;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $naicsDesc;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $yearStarted;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $sicDesc;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
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
     * @return \DateTime|null
     */
    public function getLastActivityDate()
    {
        return $this->lastActivityDate;
    }

    /**
     * @return \DateTime|null
     */
    public function getLastViewedDate()
    {
        return $this->lastViewedDate;
    }

    /**
     * @return \DateTime|null
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

    public function setMasterRecordId(string $masterRecordId) : Account
    {
        $this->masterRecordId = $masterRecordId;

        return $this;
    }

    public function setName(string $name) : Account
    {
        $this->name = $name;

        return $this;
    }

    public function setType(string $type) : Account
    {
        $this->type = $type;

        return $this;
    }

    public function setParentId(string $parentId) : Account
    {
        $this->parentId = $parentId;

        return $this;
    }

    public function setBillingAddress(Address $billingAddress) : Account
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function setShippingAddress(Address $shippingAddress) : Account
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    public function setPhone(string $phone) : Account
    {
        $this->phone = $phone;

        return $this;
    }

    public function setFax(string $fax) : Account
    {
        $this->fax = $fax;

        return $this;
    }

    public function setAccountNumber(string $accountNumber) : Account
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    public function setWebsite(string $website) : Account
    {
        $this->website = $website;

        return $this;
    }

    public function setPhotoUrl(string $photoUrl) : Account
    {
        $this->photoUrl = $photoUrl;

        return $this;
    }

    public function setSic(string $sic) : Account
    {
        $this->sic = $sic;

        return $this;
    }

    public function setIndustry(string $industry) : Account
    {
        $this->industry = $industry;

        return $this;
    }

    public function setAnnualRevenue(string $annualRevenue) : Account
    {
        $this->annualRevenue = $annualRevenue;

        return $this;
    }

    public function setNumberOfEmployees(int $numberOfEmployees) : Account
    {
        $this->numberOfEmployees = $numberOfEmployees;

        return $this;
    }

    public function setOwnership(string $ownership) : Account
    {
        $this->ownership = $ownership;

        return $this;
    }

    public function setTickerSymbol(string $tickerSymbol) : Account
    {
        $this->tickerSymbol = $tickerSymbol;

        return $this;
    }

    public function setDescription(string $description) : Account
    {
        $this->description = $description;

        return $this;
    }

    public function setRating(string $rating) : Account
    {
        $this->rating = $rating;

        return $this;
    }

    public function setSite(string $site) : Account
    {
        $this->site = $site;

        return $this;
    }

    public function setOwnerId(string $ownerId) : Account
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function setLastActivityDate(\DateTime $lastActivityDate) : Account
    {
        $this->lastActivityDate = $lastActivityDate;

        return $this;
    }

    public function setLastViewedDate(\DateTime $lastViewedDate) : Account
    {
        $this->lastViewedDate = $lastViewedDate;

        return $this;
    }

    public function setLastReferencedDate(\DateTime $lastReferencedDate) : Account
    {
        $this->lastReferencedDate = $lastReferencedDate;

        return $this;
    }

    public function setJigsaw(string $jigsaw)
    {
        $this->jigsaw = $jigsaw;

        return $this;
    }

    public function setJigsawCompanyId(string $jigsawCompanyId) : Account
    {
        $this->jigsawCompanyId = $jigsawCompanyId;

        return $this;
    }

    public function setCleanStatus(string $cleanStatus) : Account
    {
        $this->cleanStatus = $cleanStatus;

        return $this;
    }

    public function setAccountSource(string $accountSource) : Account
    {
        $this->accountSource = $accountSource;

        return $this;
    }

    public function setDunsNumber(string $dunsNumber) : Account
    {
        $this->dunsNumber = $dunsNumber;

        return $this;
    }

    public function setTradestyle(string $tradestyle) : Account
    {
        $this->tradestyle = $tradestyle;

        return $this;
    }

    public function setNaicsCode(string $naicsCode) : Account
    {
        $this->naicsCode = $naicsCode;

        return $this;
    }

    public function setNaicsDesc(string $naicsDesc) : Account
    {
        $this->naicsDesc = $naicsDesc;

        return $this;
    }

    public function setYearStarted(string $yearStarted) : Account
    {
        $this->yearStarted = $yearStarted;

        return $this;
    }

    public function setSicDesc(string $sicDesc) : Account
    {
        $this->sicDesc = $sicDesc;

        return $this;
    }

    public function setDandbCompanyId(string $dandbCompanyId) : Account
    {
        $this->dandbCompanyId = $dandbCompanyId;

        return $this;
    }

    /**
     * Because BillingAddress is not writtable
     *
     * @PreSerialize
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
     * Because ShippingAddress is not writable
     *
     * @PreSerialize
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
