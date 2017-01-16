<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

class ReplacingStrategyCollection implements \ArrayAccess
{
    /**
     * @var ReplacingStrategyInterface
     */
    protected $defaultStrategy;

    /**
     * @var ReplacingStrategyInterface[]
     */
    protected $strategies;

    public function __construct()
    {
        $this->strategies = [
            new StringReplacingStrategy(),
            new IntReplacingStrategy(),
            new DateTimeReplacingStrategy(),
            new FloatReplacingStrategy(),
            new BoolReplacingStrategy(),
        ];
        $this->defaultStrategy = new StringReplacingStrategy();
    }

    public function offsetExists($offset): bool
    {
        if (null === $offset) {
            return true; // default will be used
        }

        return $offset instanceof Type && $this->findApplicableStrategy($offset) instanceof ReplacingStrategyInterface;
    }

    /**
     * @param Type|null $offset
     *
     * @return ReplacingStrategyInterface
     */
    public function offsetGet($offset)
    {
        if (null === $offset) {
            return $this->defaultStrategy;
        }

        return $this->findApplicableStrategy($offset);
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof ReplacingStrategyInterface) {
            throw new \InvalidArgumentException(
                'Only instances of %s can be added to the collection',
                ReplacingStrategyInterface::class
            );
        }

        foreach ($this->strategies as $strategy) {
            if (is_a($strategy, get_class($value))) {
                return;
            }
        }

        $this->strategies[] = $value;
    }

    public function offsetUnset($offset): void
    {
        if (!$offset instanceof Type) {
            return;
        }

        $strategy = $this->findApplicableStrategy($offset);

        if (!$strategy) {
            return;
        }

        $index = array_search($strategy, $this->strategies, true);
        unset($this->strategies[$index]);
    }

    private function findApplicableStrategy(Type $type): ReplacingStrategyInterface
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->isApplicable($type)) {
                return $strategy;
            }
        }

        throw new \DomainException(sprintf('No applicable replacing strategy found for type: %s', $type->value()));
    }
}
