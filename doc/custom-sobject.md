Introduction
==

If you wish to use your own objects in Object Repository then this object must be properly prepared.
How it should look like:
* fields should have jms/serializer annotations:
  * `Type` - because the lib needs to know how to match fields
  * the ones which are required when creating an object should be in `create` serialization group
  * the ones which are required when updating an object should be in `update` serialization group
* the class should extend AbstractSObject

## Example
First of all you need to create your own SObjectType enum and add new object name as class constant.

```php
use Xsolve\SalesforceClient\Enum\AbstractSObjectType;

class MySObjectType extends AbstractSObjectType
{
    const MY_NEW_CLASS = 'MyNewClass';
}
```

After that you are able to create new object

```php
use Xsolve\SalesforceClient\Model\AbstractSObject;
use Xsolve\SalesforceClient\Enum\AbstractSObjectType;

class MyNewClass extends AbstractSObject
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $field;

    /**
     * {@inheritdoc}
     */
    public static function getSObjectName(): AbstractSObjectType
    {
        return MySObjectType::MY_NEW_CLASS();
    }
]
```
That's it! Now you are able to use `MyNewClass` in `SObjectRepository`.

[↑ Table of contents ↑](doc/README.md)

[← Custom request ←](custom-request.md)

[→ Expression factory →](expression-factory.md)
