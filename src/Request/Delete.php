<?php

namespace Xsolve\SalesforceClient\Request;

use Xsolve\SalesforceClient\Enum\AbstractSObjectType;

class Delete implements RequestInterface
{
    const ENDPOINT = '/sobjects/%s/%s/';

    /**
     * @var AbstractSObjectType
     */
    protected $objectType;

    /**
     * @var string
     */
    protected $id;

    public function __construct(AbstractSObjectType $objectType, string $id)
    {
        $this->objectType = $objectType;
        $this->id = $id;
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod(): string
    {
        return self::METHOD_DELETE;
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpoint(): string
    {
        return sprintf(self::ENDPOINT, $this->objectType->value(), $this->id);
    }

    /**
     * {@inheritdoc}
     */
    public function getParams(): array
    {
        return [];
    }
}
