<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Where;

use Xsolve\SalesforceClient\QueryBuilder\Expr\Visitor\VisitorInterface;

abstract class AbstractCompare extends AbstractWhere
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
        $visitor->visitCompare($this);
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
