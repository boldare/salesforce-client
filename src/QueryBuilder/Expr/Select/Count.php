<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Select;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;

class Count extends AbstractSelect implements ExprInterface
{
    /**
     * @var string|null
     */
    private $countedValue;

    public function __construct(string $countedValue = null)
    {
        $this->countedValue = $countedValue;
    }

    public function setCountedValue(string $countedValue = null)
    {
        $this->countedValue = $countedValue;
    }

    protected function getSelectPart(): string
    {
        if ($this->countedValue) {
            return sprintf('COUNT(%s)', $this->countedValue);
        }

        return 'COUNT()';
    }
}
