<?php

namespace Xsolve\SalesforceClient\Request\Object;

class Get extends Update
{
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
