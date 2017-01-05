<?php

namespace Xsolve\SalesforceClient\Request\Object;

use Xsolve\SalesforceClient\Request\SalesforceRequestInterface;

class Get implements SalesforceRequestInterface
{
    const ENDPOINT = '/sobjects/%s/%s/';

    /**
     * @var string
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

    /**
     * @param string $objectType
     * @param string $id
     * @param array $params
     */
    public function __construct(string $objectType, string $id, array $params = [])
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
        return sprintf(self::ENDPOINT, $this->objectType, $this->id);
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod(): string
    {
        return self::METHOD_GET;
    }

    /**
     * {@inheritdoc}
     */
    public function getParams(): array
    {
        if (empty($this->params)) {
            return [];
        }

        return [
            'query' => [
                'fields' => implode(',', $this->params),
            ],
        ];
    }
}
