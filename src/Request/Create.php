<?php

namespace Xsolve\SalesforceClient\Request;

use Xsolve\SalesforceClient\Enum\AbstractSObjectType;

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
    public function getMethod(): string
    {
        return self::METHOD_POST;
    }

    /**
     * {@inheritdoc}
     */
    public function getParams(): array
    {
        return [
            'json' => $this->params,
        ];
    }
}
