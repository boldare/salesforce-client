<?php

namespace Xsolve\SalesforceClient\Request;

use Xsolve\SalesforceClient\Enum\AbstractSObjectType;
use Xsolve\SalesforceClient\Enum\ContentType;
use Xsolve\SalesforceClient\Enum\RequestMethod;

class Get implements RequestInterface
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
        return RequestMethod::GET();
    }

    /**
     * {@inheritdoc}
     */
    public function getParams(): array
    {
        if (empty($this->params)) {
            return [];
        }

        return ['fields' => implode(',', $this->params)];
    }

    /**
     * {@inheritdoc}
     */
    public function getContentType(): ContentType
    {
        return ContentType::FORM();
    }
}
