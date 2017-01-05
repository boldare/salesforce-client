<?php

namespace Xsolve\SalesforceClient\Serializer;

use JMS\Serializer\Metadata\PropertyMetadata;
use JMS\Serializer\Naming\PropertyNamingStrategyInterface;

/**
 * Default CamelCaseNamingStrategy will translate camelCase to camel_case.
 *
 * @see https://github.com/schmittjoh/serializer/issues/33
 */
class CamelCaseNamingStrategy implements PropertyNamingStrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function translateName(PropertyMetadata $property): string
    {
        return ucfirst($property->name);
    }
}
