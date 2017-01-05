<?php

namespace Xsolve\SalesforceClient\Request\Object;

use Xsolve\SalesforceClient\ {
    Enum\AbstractSObjectType,
    Request\SalesforceRequestInterface
};

class Create implements SalesforceRequestInterface
{
    const ENDPOINT = '/sobjects/%s/';

    /**
     * @var string
     */
    protected $objectType;

    /**
     * @var array
     */
    protected $params;

    /**
     * @param string $objectType
     * @param array $params
     */
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
        return sprintf(self::ENDPOINT, $this->objectType);
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
