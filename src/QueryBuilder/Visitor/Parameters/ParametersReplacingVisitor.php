<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\AbstractMultiCompare;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\AbstractSingleCompare;
use Xsolve\SalesforceClient\QueryBuilder\Visitor\VisitorInterface;

class ParametersReplacingVisitor implements VisitorInterface
{
    /**
     * @var array
     */
    private $parameters;

    /**
     * @var ReplacingStrategyCollection
     */
    private $replacingStrategies;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
        $this->replacingStrategies = new ReplacingStrategyCollection();
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

    protected function replaceParameters(string $subject): string
    {
        foreach ($this->parameters as $name => $value) {
            $type = null;

            if (is_array($value)) {
                $type = $value['type'];
                $value = $value['value'];
            }

            $subject = preg_replace(
                sprintf('/(\{%s\})/', preg_quote($name, '/')),
                $this->replacingStrategies[$type]->replace($value),
                $subject
            );
        }

        return $subject;
    }
}
