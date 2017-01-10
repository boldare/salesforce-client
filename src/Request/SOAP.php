<?php

namespace Xsolve\SalesforceClient\Request;

use Xsolve\SalesforceClient\SOAP\Object;

class SOAP implements RequestInterface
{
    /**
     * @var object
     */
    protected $object;

    public function __construct(Object $builder)
    {
        $this->object = $builder;
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpoint(): string
    {
        return '';
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
            'body' => $this->object->getXml(),
        ];
    }

    public function setToken(string $token)
    {
        $this->object->setToken($token);
    }
}
