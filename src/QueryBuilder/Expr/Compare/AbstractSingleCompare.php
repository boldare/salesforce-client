<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Compare;

use Xsolve\SalesforceClient\QueryBuilder\Expr\Visitor\VisitorInterface;

abstract class AbstractSingleCompare extends AbstractCompare
{
    /**
     * @var string
     */
    private $left;

    /**
     * @var string
     */
    private $right;

    public function __construct(string $left, string $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

    public function getLeft(): string
    {
        return $this->left;
    }

    public function getRight(): string
    {
        return $this->right;
    }

    public function accept(VisitorInterface $visitor)
    {
        $visitor->visitSingleCompare($this);
    }

    public function update(array $values)
    {
        if (isset($values['left'])) {
            $this->left = $values['left'];
        }

        if (isset($values['right'])) {
            $this->right = $values['right'];
        }
    }
}
