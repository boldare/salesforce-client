<?php

namespace Xsolve\SalesforceClient\Model;

use JMS\Serializer\Annotation\Type;
use Xsolve\SalesforceClient\Enum\AbstractSObjectType;

abstract class AbstractSObject
{
    /**
     * @var string
     * @Type("string")
     */
    protected $id;

    /**
     * @var string
     * @Type("string")
     */
    protected $createdById;

    /**
     * @var \DateTime
     * @Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $createdDate;

    /**
     * @var string
     * @Type("string")
     */
    protected $lastModifiedById;

    /**
     * @var \DateTime
     * @Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $lastModifiedDate;

    /**
     * @var \DateTime
     * @Type("DateTime<'Y-m-d\TH:i:s.\0\0\0O'>")
     */
    protected $systemModstamp;

    abstract public static function getSObjectName(): AbstractSObjectType;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCreatedById()
    {
        return $this->createdById;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @return string
     */
    public function getLastModifiedById()
    {
        return $this->lastModifiedById;
    }

    /**
     * @return \DateTime
     */
    public function getLastModifiedDate()
    {
        return $this->lastModifiedDate;
    }

    /**
     * @return \DateTime
     */
    public function getSystemModstamp()
    {
        return $this->systemModstamp;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }
}
