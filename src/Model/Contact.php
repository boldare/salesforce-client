<?php

namespace Xsolve\SalesforceClient\Model;

use JMS\Serializer\Annotation as JMS;
use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\SObjectType;

class Contact extends AbstractSObject
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $accountId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $assistantName;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $assistantPhone;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\Groups({"create", "update"})
     */
    protected $birthdate;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $cleanStatus;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $department;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $description;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $email;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $emailBouncedDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $emailBouncedReason;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $fax;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $firstName;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $lastName;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $homePhone;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isDeleted;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isEmailBounced;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isPersonAccount;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $jigsaw;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastActivityDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastCURequestDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastCUUpdateDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastReferencedDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastViewedDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $leadSource;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $mobilePhone;

    /**
     * @var ValueObject\Address|null
     * @JMS\Type("Xsolve\SalesforceClient\Model\ValueObject\Address")
     */
    protected $mailingAddress;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $mailingStreet;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $mailingCity;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $mailingState;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $mailingPostalCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $mailingCountry;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $mailingLatitude;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $mailingLongitude;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $masterRecordId;

    /**
     * @var ValueObject\Address|null
     * @JMS\Type("Xsolve\SalesforceClient\Model\ValueObject\Address")
     */
    protected $otherAddress;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $otherStreet;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $otherCity;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $otherState;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $otherPostalCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $otherCountry;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $otherLatitude;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $otherLongitude;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $otherPhone;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $phone;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $ownerId;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $photoUrl;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $reportsToId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $salutation;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $suffix;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $title;

    /**
     * {@inheritdoc}
     */
    public static function getSObjectName(): AbstractSObjectType
    {
        return SObjectType::CONTACT();
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
    public function getAssistantName()
    {
        return $this->assistantName;
    }

    /**
     * @return string|null
     */
    public function getAssistantPhone()
    {
        return $this->assistantPhone;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getBirthdate()
    {
        return $this->birthdate;
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
    public function getDepartment()
    {
        return $this->department;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEmailBouncedDate()
    {
        return $this->emailBouncedDate;
    }

    /**
     * @return string|null
     */
    public function getEmailBouncedReason()
    {
        return $this->emailBouncedReason;
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
    public function getName()
    {
        return $this->name;
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
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string|null
     */
    public function getHomePhone()
    {
        return $this->homePhone;
    }

    /**
     * @return bool|null
     */
    public function isDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * @return bool|null
     */
    public function isEmailBounced()
    {
        return $this->isEmailBounced;
    }

    /**
     * @return bool|null
     */
    public function isPersonAccount()
    {
        return $this->isPersonAccount;
    }

    /**
     * @return string|null
     */
    public function getJigsaw()
    {
        return $this->jigsaw;
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
    public function getLastCURequestDate()
    {
        return $this->lastCURequestDate;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLastCUUpdateDate()
    {
        return $this->lastCUUpdateDate;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLastReferencedDate()
    {
        return $this->lastReferencedDate;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLastViewedDate()
    {
        return $this->lastViewedDate;
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
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * @return ValueObject\Address|null
     */
    public function getMailingAddress()
    {
        return $this->mailingAddress;
    }

    /**
     * @return ValueObject\Address|null
     */
    public function getOtherAddress()
    {
        return $this->otherAddress;
    }

    /**
     * @return string|null
     */
    public function getOtherPhone()
    {
        return $this->otherPhone;
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
    public function getOwnerId()
    {
        return $this->ownerId;
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
    public function getReportsToId()
    {
        return $this->reportsToId;
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
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function setAccountId(string $accountId = null): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function setAssistantName(string $assistantName = null): self
    {
        $this->assistantName = $assistantName;

        return $this;
    }

    public function setAssistantPhone(string $assistantPhone = null): self
    {
        $this->assistantPhone = $assistantPhone;

        return $this;
    }

    public function setBirthdate(\DateTimeInterface $birthdate = null): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function setCleanStatus(string $cleanStatus = null): self
    {
        $this->cleanStatus = $cleanStatus;

        return $this;
    }

    public function setDepartment(string $department = null): self
    {
        $this->department = $department;

        return $this;
    }

    public function setDescription(string $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    public function setEmail(string $email = null): self
    {
        $this->email = $email;

        return $this;
    }

    public function setEmailBouncedDate(\DateTimeInterface $emailBouncedDate = null): self
    {
        $this->emailBouncedDate = $emailBouncedDate;

        return $this;
    }

    public function setEmailBouncedReason(string $emailBouncedReason = null): self
    {
        $this->emailBouncedReason = $emailBouncedReason;

        return $this;
    }

    public function setFax(string $fax = null): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function setFirstName(string $firstName = null): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function setHomePhone(string $homePhone = null): self
    {
        $this->homePhone = $homePhone;

        return $this;
    }

    public function setJigsaw(string $jigsaw = null): self
    {
        $this->jigsaw = $jigsaw;

        return $this;
    }

    public function setLastReferencedDate(\DateTimeInterface $lastReferencedDate): self
    {
        $this->lastReferencedDate = $lastReferencedDate;

        return $this;
    }

    public function setLastViewedDate(\DateTimeInterface $lastViewedDate): self
    {
        $this->lastViewedDate = $lastViewedDate;

        return $this;
    }

    public function setLeadSource(string $leadSource = null): self
    {
        $this->leadSource = $leadSource;

        return $this;
    }

    public function setMobilePhone(string $mobilePhone = null): self
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    public function setMailingAddress(ValueObject\Address $mailingAddress): self
    {
        $this->mailingAddress = $mailingAddress;

        return $this;
    }

    public function setOtherAddress(ValueObject\Address $otherAddress): self
    {
        $this->otherAddress = $otherAddress;

        return $this;
    }

    public function setOtherPhone(string $otherPhone = null): self
    {
        $this->otherPhone = $otherPhone;

        return $this;
    }

    public function setPhone(string $phone = null): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function setOwnerId(string $ownerId): self
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function setReportsToId(string $reportsToId = null): self
    {
        $this->reportsToId = $reportsToId;

        return $this;
    }

    public function setSalutation(string $salutation = null): self
    {
        $this->salutation = $salutation;

        return $this;
    }

    public function setSuffix(string $suffix = null): self
    {
        $this->suffix = $suffix;

        return $this;
    }

    public function setTitle(string $title = null): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @JMS\PreSerialize
     */
    public function updateMailingAddress()
    {
        if (!$this->mailingAddress instanceof ValueObject\Address) {
            return;
        }

        $this->mailingCity = $this->mailingAddress->getCity();
        $this->mailingCountry = $this->mailingAddress->getCountry();
        $this->mailingLatitude = $this->mailingAddress->getLatitude();
        $this->mailingLongitude = $this->mailingAddress->getLongitude();
        $this->mailingPostalCode = $this->mailingAddress->getPostalCode();
        $this->mailingState = $this->mailingAddress->getState();
        $this->mailingStreet = $this->mailingAddress->getStreet();
    }

    /**
     * @JMS\PreSerialize
     */
    public function updateOtherAddress()
    {
        if (!$this->otherAddress instanceof ValueObject\Address) {
            return;
        }

        $this->otherCity = $this->otherAddress->getCity();
        $this->otherCountry = $this->otherAddress->getCountry();
        $this->otherLatitude = $this->otherAddress->getLatitude();
        $this->otherLongitude = $this->otherAddress->getLongitude();
        $this->otherPostalCode = $this->otherAddress->getPostalCode();
        $this->otherState = $this->otherAddress->getState();
        $this->otherStreet = $this->otherAddress->getStreet();
    }
}
