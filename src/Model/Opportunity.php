<?php

namespace Xsolve\SalesforceClient\Model;

use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\SObjectType;
use JMS\Serializer\Annotation as JMS;

class Opportunity extends AbstractSObject
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $accountId;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"create", "update"})
     */
    protected $amount;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $campaignId;

    /**
     * @var \DateTimeInterface
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\Groups({"create", "update"})
     */
    protected $closeDate;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $description;

    /**
     * @var float|null
     * @JMS\Type("float")
     */
    protected $expectedRevenue;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $fiscal;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $fiscalQuarter;

    /**
     * @var int|null
     * @JMS\Type("int")
     */
    protected $fiscalYear;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $forecastCategory;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $forecastCategoryName;

    /**
     * @var bool
     * @JMS\Type("boolean")
     */
    protected $hasOpenActivity;

    /**
     * @var bool
     * @JMS\Type("boolean")
     */
    protected $hasOpportunityLineItem;

    /**
     * @var bool
     * @JMS\Type("boolean")
     */
    protected $hasOverdueTask;

    /**
     * @var bool
     * @JMS\Type("boolean")
     */
    protected $isClosed;

    /**
     * @var bool
     * @JMS\Type("boolean")
     */
    protected $isDeleted;

    /**
     * @var bool
     * @JMS\Type("boolean")
     */
    protected $isWon;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastActivityDate;

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
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $name;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $nextStep;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $ownerId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     * @JMS\SerializedName("Pricebook2Id")
     */
    protected $pricebookId;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"create", "update"})
     */
    protected $probability;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"create", "update"})
     */
    protected $stageName;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"create", "update"})
     */
    protected $totalOpportunityQuantity;

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
        return SObjectType::OPPORTUNITY();
    }

    /**
     * @return string|null
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @return float|null
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string|null
     */
    public function getCampaignId()
    {
        return $this->campaignId;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCloseDate()
    {
        return $this->closeDate;
    }

    /**
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return float|null
     */
    public function getExpectedRevenue()
    {
        return $this->expectedRevenue;
    }

    /**
     * @return string|null
     */
    public function getFiscal()
    {
        return $this->fiscal;
    }

    /**
     * @return string|null
     */
    public function getFiscalQuarter()
    {
        return $this->fiscalQuarter;
    }

    /**
     * @return int|null
     */
    public function getFiscalYear()
    {
        return $this->fiscalYear;
    }

    /**
     * @return string|null
     */
    public function getForecastCategory()
    {
        return $this->forecastCategory;
    }

    /**
     * @return string|null
     */
    public function getForecastCategoryName()
    {
        return $this->forecastCategoryName;
    }

    /**
     * @return bool|null
     */
    public function hasOpenActivity()
    {
        return $this->hasOpenActivity;
    }

    /**
     * @return bool|null
     */
    public function hasOpportunityLineItem()
    {
        return $this->hasOpportunityLineItem;
    }

    /**
     * @return bool|null
     */
    public function hasOverdueTask()
    {
        return $this->hasOverdueTask;
    }

    /**
     * @return bool|null
     */
    public function isClosed()
    {
        return $this->isClosed;
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
    public function isWon()
    {
        return $this->isWon;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getNextStep()
    {
        return $this->nextStep;
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
    public function getPricebookId()
    {
        return $this->pricebookId;
    }

    /**
     * @return float|null
     */
    public function getProbability()
    {
        return $this->probability;
    }

    /**
     * @return string|null
     */
    public function getStageName()
    {
        return $this->stageName;
    }

    /**
     * @return float|null
     */
    public function getTotalOpportunityQuantity()
    {
        return $this->totalOpportunityQuantity;
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

    public function setAmount(float $amount = null): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function setCampaignId(string $campaignId = null): self
    {
        $this->campaignId = $campaignId;

        return $this;
    }

    public function setCloseDate(\DateTimeInterface $closeDate): self
    {
        $this->closeDate = $closeDate;

        return $this;
    }

    public function setDescription(string $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    public function setForecastCategoryName(string $forecastCategoryName = null): self
    {
        $this->forecastCategoryName = $forecastCategoryName;

        return $this;
    }

    public function setLeadSource(string $leadSource = null): self
    {
        $this->leadSource = $leadSource;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setNextStep(string $nextStep = null): self
    {
        $this->nextStep = $nextStep;

        return $this;
    }

    public function setOwnerId(string $ownerId): self
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function setPricebookId(string $pricebookId = null): self
    {
        $this->pricebookId = $pricebookId;

        return $this;
    }

    public function setProbability(float $probability = null): self
    {
        $this->probability = $probability;

        return $this;
    }

    public function setStageName(string $stageName): self
    {
        $this->stageName = $stageName;

        return $this;
    }

    public function setTotalOpportunityQuantity(float $totalOpportunityQuantity = null): self
    {
        $this->totalOpportunityQuantity = $totalOpportunityQuantity;

        return $this;
    }

    public function setType(string $type = null): self
    {
        $this->type = $type;

        return $this;
    }
}
