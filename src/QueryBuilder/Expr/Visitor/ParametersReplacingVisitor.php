<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Visitor;

use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\AbstractMultiCompare;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\AbstractSingleCompare;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Visitor\VisitorInterface;

class ParametersReplacingVisitor implements VisitorInterface
{
    /**
     * @var array
     */
    private $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function visitSingleCompare(AbstractSingleCompare $compare)
    {
        $compare->update([
            'left' => $this->replaceParameters($compare->getLeft()),
            'right' => $this->replaceParameters($compare->getRight()),
        ]);
    }

    public function visitMultiCompare(AbstractMultiCompare $multiCompare)
    {
        $replacedValues = array_map([$this, 'replaceParameters'], $multiCompare->getValues());
        $multiCompare->update($replacedValues);
    }

    protected function replaceParameters($subject)
    {
        foreach ($this->parameters as $name => $value) {
            $subject = preg_replace(sprintf('/(\{%s\})/', preg_quote($name, '/')), $value, $subject);
        }

        return $subject;
    }
}
