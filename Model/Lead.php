<?php

namespace Xsolve\SalesforceClient\Model;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\PreSerialize;
use JMS\Serializer\Annotation\Type;
use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\SObjectType;

class Lead extends AbstractSObject
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
    protected $lastName;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $firstName;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $salutation;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $name;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $company;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $street;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $city;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $state;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $postalCode;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $country;

    /**
     * @var float|null
     * @Type("float")
     * @Groups({"update"})
     */
    protected $latitude;

    /**
     * @var float|null
     * @Type("float")
     * @Groups({"update"})
     */
    protected $longitude;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $geocodeAccuracy;

    /**
     * @var array|null
     * @Type("Xsolve\SalesforceClient\Model\Address")
     */
    protected $address;

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
    protected $mobilePhone;

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
    protected $email;

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
    protected $description;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $leadSource;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $status;

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
    protected $rating;

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
    protected $ownerId;

    /**
     * @var bool|null
     * @Type("boolean")
     */
    protected $isConverted;

    /**
     * @var \DateTime|null
     * @Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $convertedDate;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $convertedAccountId;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $convertedContactId;

    /**
     * @var string|null
     * @Type("string")
     */
    protected $convertedOpportunityId;

    /**
     * @var bool
     * @Type("boolean")
     * @Groups({"update"})
     */
    protected $isUnreadByOwner;

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
     * @Groups({"update"})
     */
    protected $jigsaw;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $jigsawContactId;

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
    protected $companyDunsNumber;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $dandbCompanyId;

    /**
     * @var string|null
     * @Type("string")
     * @Groups({"update"})
     */
    protected $emailBouncedReason;

    /**
     * @var \DateTime|null
     * @Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     * @Groups({"update"})
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
     * @return string|null
     */
    public function getAnnualRevenue()
    {
        return $this->annualRevenue;
    }

    /**
     * @return string|null
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
     * @return \DateTimeInterface
     */
    public function getLastViewedDate()
    {
        return $this->lastViewedDate;
    }

    /**
     * @return \DateTimeInterface
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

    public function setMasterRecordId(string $masterRecordId)
    {
        $this->masterRecordId = $masterRecordId;

        return $this;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setSalutation(string $salutation)
    {
        $this->salutation = $salutation;

        return $this;
    }

    public function setCompany(string $company)
    {
        $this->company = $company;

        return $this;
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;

        return $this;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;

        return $this;
    }

    public function setMobilePhone(string $mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    public function setFax(string $fax)
    {
        $this->fax = $fax;

        return $this;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    public function setWebsite(string $website)
    {
        $this->website = $website;

        return $this;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    public function setLeadSource(string $leadSource)
    {
        $this->leadSource = $leadSource;

        return $this;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;

        return $this;
    }

    public function setIndustry(string $industry)
    {
        $this->industry = $industry;

        return $this;
    }

    public function setRating(string $rating)
    {
        $this->rating = $rating;

        return $this;
    }

    public function setAnnualRevenue(string $annualRevenue)
    {
        $this->annualRevenue = $annualRevenue;

        return $this;
    }

    public function setNumberOfEmployees(int $numberOfEmployees)
    {
        $this->numberOfEmployees = $numberOfEmployees;

        return $this;
    }

    public function setOwnerId(string $ownerId)
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function setUnreadByOwner(bool $isUnreadByOwner)
    {
        $this->isUnreadByOwner = $isUnreadByOwner;

        return $this;
    }

    public function setLastViewedDate(\DateTimeInterface $lastViewedDate)
    {
        $this->lastViewedDate = $lastViewedDate;

        return $this;
    }

    public function setLastReferencedDate(\DateTimeInterface $lastReferencedDate)
    {
        $this->lastReferencedDate = $lastReferencedDate;

        return $this;
    }

    public function setJigsaw(string $jigsaw)
    {
        $this->jigsaw = $jigsaw;

        return $this;
    }

    public function setJigsawContactId(string $jigsawContactId)
    {
        $this->jigsawContactId = $jigsawContactId;

        return $this;
    }

    public function setCleanStatus(string $cleanStatus)
    {
        $this->cleanStatus = $cleanStatus;

        return $this;
    }

    public function setCompanyDunsNumber(string $companyDunsNumber)
    {
        $this->companyDunsNumber = $companyDunsNumber;

        return $this;
    }

    public function setDandbCompanyId(string $dandbCompanyId)
    {
        $this->dandbCompanyId = $dandbCompanyId;

        return $this;
    }

    public function setEmailBouncedReason(string $emailBouncedReason)
    {
        $this->emailBouncedReason = $emailBouncedReason;

        return $this;
    }

    public function setEmailBouncedDate(\DateTimeInterface $emailBouncedDate)
    {
        $this->emailBouncedDate = $emailBouncedDate;

        return $this;
    }

    /**
     * Because Adrress is not writable.
     *
     * @PreSerialize
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
