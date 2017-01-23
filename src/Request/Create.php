<?php

namespace Xsolve\SalesforceClient\Request;

use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\ContentType;
use Xsolve\SalesforceClient\Enum\RequestMethod;

class Create implements RequestInterface
{
    const ENDPOINT = '/sobjects/%s/';

    /**
     * @var AbstractSObjectType
     */
    protected $objectType;

    /**
     * @var array
     */
    protected $params;

    public function __construct(AbstractSObjectType $objectType, array $params = [])
    {
        $this->objectType = $objectType;
        $this->params = $params;
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpoint(): string
    {
        return sprintf(self::ENDPOINT, $this->objectType->value());
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod(): RequestMethod
    {
        return RequestMethod::POST();
    }

    /**
     * {@inheritdoc}
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * {@inheritdoc}
     */
    public function getContentType(): ContentType
    {
        return ContentType::JSON();
    }
}
