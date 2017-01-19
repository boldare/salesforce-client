<?php

namespace Xsolve\SalesforceClient\Model;

use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\SObjectType;
use JMS\Serializer\Annotation as JMS;

/**
 * Because Case is reserved word this class is called CaseSO (Case Standard Object).
 */
class CaseSO extends AbstractSObject
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
     */
    protected $caseNumber;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $closedDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $contactEmail;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $contactFax;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $contactId;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $contactMobile;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $ContactPhone;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $creatorFullPhotoUrl;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $creatorName;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $creatorSmallPhotoUrl;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $description;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create"})
     */
    protected $feedItemId;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $hasCommentsUnreadByOwner;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $hasSelfServiceComments;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $IsClosed;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isClosedOnCreate;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isDeleted;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     * @JMS\Groups({"create", "update"})
     */
    protected $isEscalated;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isSelfServiceClosed;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isStopped;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isVisibleInSelfService;

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
    protected $origin;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $ownerId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $parentId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $priority;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $reason;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $status;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $stopStartDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $subject;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $suppliedCompany;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $suppliedEmail;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $suppliedName;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $suppliedPhone;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $type;

    /**
     * {@inheritdoc}
     */
    public static function getSObjectName(): AbstractSObjectType
    {
        return SObjectType::CASE_SO();
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
    public function getCaseNumber()
    {
        return $this->caseNumber;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getClosedDate()
    {
        return $this->closedDate;
    }

    /**
     * @return string|null
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * @return string|null
     */
    public function getContactFax()
    {
        return $this->contactFax;
    }

    /**
     * @return string|null
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * @return string|null
     */
    public function getContactMobile()
    {
        return $this->contactMobile;
    }

    /**
     * @return string|null
     */
    public function getContactPhone()
    {
        return $this->ContactPhone;
    }

    /**
     * @return string|null
     */
    public function getCreatorFullPhotoUrl()
    {
        return $this->creatorFullPhotoUrl;
    }

    /**
     * @return string|null
     */
    public function getCreatorName()
    {
        return $this->creatorName;
    }

    /**
     * @return string|null
     */
    public function getCreatorSmallPhotoUrl()
    {
        return $this->creatorSmallPhotoUrl;
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
    public function getFeedItemId()
    {
        return $this->feedItemId;
    }

    /**
     * @return bool|null
     */
    public function hasCommentsUnreadByOwner()
    {
        return $this->hasCommentsUnreadByOwner;
    }

    /**
     * @return bool|null
     */
    public function hasSelfServiceComments()
    {
        return $this->hasSelfServiceComments;
    }

    /**
     * @return bool|null
     */
    public function isClosed()
    {
        return $this->IsClosed;
    }

    /**
     * @return bool|null
     */
    public function isClosedOnCreate()
    {
        return $this->isClosedOnCreate;
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
    public function isEscalated()
    {
        return $this->isEscalated;
    }

    /**
     * @return bool|null
     */
    public function isSelfServiceClosed()
    {
        return $this->isSelfServiceClosed;
    }

    /**
     * @return bool|null
     */
    public function isStopped()
    {
        return $this->isStopped;
    }

    /**
     * @return bool|null
     */
    public function isVisibleInSelfService()
    {
        return $this->isVisibleInSelfService;
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
    public function getOrigin()
    {
        return $this->origin;
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
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @return string|null
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @return string|null
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getStopStartDate()
    {
        return $this->stopStartDate;
    }

    /**
     * @return string|null
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string|null
     */
    public function getSuppliedCompany()
    {
        return $this->suppliedCompany;
    }

    /**
     * @return string|null
     */
    public function getSuppliedEmail()
    {
        return $this->suppliedEmail;
    }

    /**
     * @return string|null
     */
    public function getSuppliedName()
    {
        return $this->suppliedName;
    }

    /**
     * @return string|null
     */
    public function getSuppliedPhone()
    {
        return $this->suppliedPhone;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    public function setAccountId(string $accountId = null): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function setContactId($contactId = null): self
    {
        $this->contactId = $contactId;

        return $this;
    }

    public function setDescription(string $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    public function setFeedItemId(string $feedItemId = null): self
    {
        $this->feedItemId = $feedItemId;

        return $this;
    }

    public function setEscalated(bool $isEscalated): self
    {
        $this->isEscalated = $isEscalated;

        return $this;
    }

    public function setOrigin(string $origin = null): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function setOwnerId(string $ownerId): self
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function setParentId(string $parentId = null): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    public function setPriority(string $priority = null): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function setReason(string $reason = null): self
    {
        $this->reason = $reason;

        return $this;
    }

    public function setStatus(string $status = null): self
    {
        $this->status = $status;

        return $this;
    }

    public function setSubject(string $subject = null): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function setSuppliedCompany(string $suppliedCompany = null): self
    {
        $this->suppliedCompany = $suppliedCompany;

        return $this;
    }

    public function setSuppliedEmail(string $suppliedEmail = null): self
    {
        $this->suppliedEmail = $suppliedEmail;

        return $this;
    }

    public function setSuppliedName(string $suppliedName = null): self
    {
        $this->suppliedName = $suppliedName;

        return $this;
    }

    public function setSuppliedPhone(string $suppliedPhone = null): self
    {
        $this->suppliedPhone = $suppliedPhone;

        return $this;
    }

    public function setType(string $type = null): self
    {
        $this->type = $type;

        return $this;
    }
}
