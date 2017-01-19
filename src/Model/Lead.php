<?php

namespace Xsolve\SalesforceClient\Model;

use JMS\Serializer\Annotation as JMS;
use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\SObjectType;
use Xsolve\SalesforceClient\Model\ValueObject\Address;

class Lead extends AbstractSObject
{
    /**
     * @var bool
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
    protected $lastName;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $firstName;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $salutation;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $company;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $street;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $city;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $state;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $postalCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $country;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $latitude;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $longitude;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $geocodeAccuracy;

    /**
     * @var Address|null
     * @JMS\Type("Xsolve\SalesforceClient\Model\ValueObject\Address")
     */
    protected $address;

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
    protected $mobilePhone;

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
    protected $email;

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
    protected $description;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $leadSource;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $status;

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
    protected $rating;

    /**
     * @var float|null
     * @JMS\Type("float")
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
    protected $ownerId;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isConverted;

    /**
     * @var \DateTime|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $convertedDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $convertedAccountId;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $convertedContactId;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $convertedOpportunityId;

    /**
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\Groups({"update", "create"})
     */
    protected $isUnreadByOwner;

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
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $jigsaw;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $jigsawContactId;

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
    protected $companyDunsNumber;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $dandbCompanyId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $emailBouncedReason;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     * @JMS\Groups({"update", "create"})
     */
    protected $emailBouncedDate;

    /**
     * {@inheritdoc}
     */
    public static function getSObjectName(): AbstractSObjectType
    {
        return SObjectType::LEAD();
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
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string|null
     */
    public function getSalutation()
    {
        return $this->salutation;
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
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return string|null
     */
    public function getGeocodeAccuracy()
    {
        return $this->geocodeAccuracy;
    }

    /**
     * @return Address|null
     */
    public function getAddress()
    {
        return $this->address;
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
    public function getMobilePhone()
    {
        return $this->mobilePhone;
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
    public function getEmail()
    {
        return $this->email;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getLeadSource()
    {
        return $this->leadSource;
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
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * @return string|null
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @return float|null
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
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * @return bool|null
     */
    public function isConverted()
    {
        return $this->isConverted;
    }

    /**
     * @return \DateTime|null
     */
    public function getConvertedDate()
    {
        return $this->convertedDate;
    }

    /**
     * @return string|null
     */
    public function getConvertedAccountId()
    {
        return $this->convertedAccountId;
    }

    /**
     * @return string|null
     */
    public function getConvertedContactId()
    {
        return $this->convertedContactId;
    }

    /**
     * @return string|null
     */
    public function getConvertedOpportunityId()
    {
        return $this->convertedOpportunityId;
    }

    /**
     * @return bool
     */
    public function isUnreadByOwner()
    {
        return $this->isUnreadByOwner;
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
    public function getJigsawContactId()
    {
        return $this->jigsawContactId;
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
    public function getCompanyDunsNumber()
    {
        return $this->companyDunsNumber;
    }

    /**
     * @return string|null
     */
    public function getDandbCompanyId()
    {
        return $this->dandbCompanyId;
    }

    /**
     * @return string|null
     */
    public function getEmailBouncedReason()
    {
        return $this->emailBouncedReason;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEmailBouncedDate()
    {
        return $this->emailBouncedDate;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function setFirstName(string $firstName = null): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setSalutation(string $salutation = null): self
    {
        $this->salutation = $salutation;

        return $this;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function setPhone(string $phone = null): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function setMobilePhone(string $mobilePhone = null): self
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    public function setFax(string $fax = null): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function setEmail(string $email = null): self
    {
        $this->email = $email;

        return $this;
    }

    public function setWebsite(string $website = null): self
    {
        $this->website = $website;

        return $this;
    }

    public function setDescription(string $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    public function setLeadSource(string $leadSource = null): self
    {
        $this->leadSource = $leadSource;

        return $this;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function setIndustry(string $industry = null): self
    {
        $this->industry = $industry;

        return $this;
    }

    public function setRating(string $rating = null): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function setAnnualRevenue(float $annualRevenue = null): self
    {
        $this->annualRevenue = $annualRevenue;

        return $this;
    }

    public function setNumberOfEmployees(int $numberOfEmployees = null): self
    {
        $this->numberOfEmployees = $numberOfEmployees;

        return $this;
    }

    public function setOwnerId(string $ownerId): self
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function setUnreadByOwner(bool $isUnreadByOwner): self
    {
        $this->isUnreadByOwner = $isUnreadByOwner;

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

    public function setJigsaw(string $jigsaw = null): self
    {
        $this->jigsaw = $jigsaw;

        return $this;
    }

    public function setCleanStatus(string $cleanStatus = null): self
    {
        $this->cleanStatus = $cleanStatus;

        return $this;
    }

    public function setCompanyDunsNumber(string $companyDunsNumber = null): self
    {
        $this->companyDunsNumber = $companyDunsNumber;

        return $this;
    }

    public function setDandbCompanyId(string $dandbCompanyId = null): self
    {
        $this->dandbCompanyId = $dandbCompanyId;

        return $this;
    }

    public function setEmailBouncedReason(string $emailBouncedReason = null): self
    {
        $this->emailBouncedReason = $emailBouncedReason;

        return $this;
    }

    public function setEmailBouncedDate(\DateTimeInterface $emailBouncedDate = null): self
    {
        $this->emailBouncedDate = $emailBouncedDate;

        return $this;
    }

    /**
     * Because Adrress is not writable.
     *
     * @JMS\PreSerialize
     */
    public function updateAddress()
    {
        if (!$this->address instanceof Address) {
            return;
        }

        $this->city = $this->address->getCity();
        $this->country = $this->address->getCountry();
        $this->latitude = $this->address->getLatitude();
        $this->longitude = $this->address->getLongitude();
        $this->postalCode = $this->address->getPostalCode();
        $this->state = $this->address->getState();
        $this->street = $this->address->getStreet();
    }
}
