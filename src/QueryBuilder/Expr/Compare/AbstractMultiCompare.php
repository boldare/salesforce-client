<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

use Xsolve\SalesforceClient\QueryBuilder\Visitor\VisitorInterface;

abstract class AbstractMultiCompare extends AbstractCompare
{
    /**
     * @var string
     */
    private $left;

    /**
     * @var array
     */
    private $values;

    public function __construct(string $left, array $values)
    {
        $this->left = $left;
        $this->values = $values;
    }

    public function getLeft(): string
    {
        return $this->left;
    }

    public function getRight(): string
    {
        return sprintf('(%s)', implode(',', $this->values));
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitMultiCompare($this);
    }

    public function update(array $values)
    {
        $this->values = $values;
    }
}
