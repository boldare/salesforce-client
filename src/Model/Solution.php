<?php

namespace Xsolve\SalesforceClient\Model;

use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\SObjectType;
use JMS\Serializer\Annotation as JMS;

class Solution extends AbstractSObject
{
    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isDeleted;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isHtml;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isOutOfDate;

    /**
     * @var bool|null
     * @JMS\Type("boolean")")
     * @JMS\Groups({"create", "update"})
     */
    protected $isPublished;

    /**
     * @var bool|null
     * @JMS\Type("boolean")")
     * @JMS\Groups({"create", "update"})
     */
    protected $isPublishedInPublicKb;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     */
    protected $isReviewed;

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
    protected $recordTypeId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $solutionLanguage;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $solutionName;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $solutionNote;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $solutionNumber;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $status;

    /**
     * @var int|null
     * @JMS\Type("int")
     */
    protected $timesUsed;

    /**
     * {@inheritdoc}
     */
    public static function getSObjectName(): AbstractSObjectType
    {
        return SObjectType::SOLUTION();
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
    public function isHtml()
    {
        return $this->isHtml;
    }

    /**
     * @return bool|null
     */
    public function isOutOfDate()
    {
        return $this->isOutOfDate;
    }

    /**
     * @return bool|null
     */
    public function isPublished()
    {
        return $this->isPublished;
    }

    /**
     * @return bool|null
     */
    public function isPublishedInPublicKb()
    {
        return $this->isPublishedInPublicKb;
    }

    /**
     * @return bool|null
     */
    public function isReviewed()
    {
        return $this->isReviewed;
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
    public function getRecordTypeId()
    {
        return $this->recordTypeId;
    }

    /**
     * @return string|null
     */
    public function getSolutionLanguage()
    {
        return $this->solutionLanguage;
    }

    /**
     * @return string|null
     */
    public function getSolutionName()
    {
        return $this->solutionName;
    }

    /**
     * @return string|null
     */
    public function getSolutionNote()
    {
        return $this->solutionNote;
    }

    /**
     * @return string|null
     */
    public function getSolutionNumber()
    {
        return $this->solutionNumber;
    }

    /**
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return int|null
     */
    public function getTimesUsed()
    {
        return $this->timesUsed;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function setIsPublishedInPublicKb(bool $isPublishedInPublicKb): self
    {
        $this->isPublishedInPublicKb = $isPublishedInPublicKb;

        return $this;
    }

    public function setOwnerId(string $ownerId): self
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function setParentId(string $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    public function setRecordTypeId(string $recordTypeId): self
    {
        $this->recordTypeId = $recordTypeId;

        return $this;
    }

    public function setSolutionLanguage(string $solutionLanguage): self
    {
        $this->solutionLanguage = $solutionLanguage;

        return $this;
    }

    public function setSolutionName(string $solutionName): self
    {
        $this->solutionName = $solutionName;

        return $this;
    }

    public function setSolutionNote(string $solutionNote): self
    {
        $this->solutionNote = $solutionNote;

        return $this;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
