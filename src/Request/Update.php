<?php

namespace Xsolve\SalesforceClient\Request;

use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\ContentType;
use Xsolve\SalesforceClient\Enum\RequestMethod;

class Update implements RequestInterface
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

    /**
     * @var array
     */
    protected $params;

    public function __construct(AbstractSObjectType $objectType, string $id, array $params = [])
    {
        $this->objectType = $objectType;
        $this->id = $id;
        $this->params = $params;
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
    public function getMethod(): RequestMethod
    {
        return RequestMethod::PATCH();
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
