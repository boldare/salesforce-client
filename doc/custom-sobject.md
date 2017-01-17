Introduction
==

If you want to use your object in Object Repository then this object must be properly prepared.
How it should look like:
* fields should have jms/serializer annotations:
  * `Type` - because we need to know how to match fields
  * Those ones which may be on creating should be in group `create`
  * Those ones which may be on update should be in group `create`
* should extend AbstractSObject

## Example
First of all we need to create our own SObjectType enum and add to constants new object name.

```php
use Xsolve\SalesforceClient\Enum\AbstractSObjectType;

class MySObjectType extends AbstractSObjectType
{
    const MY_NEW_CLASS = 'MyNewClass';
}
```

After that we are able to create new object

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
That's all, now we are able to use `MyNewClass` in `SObjectRepository`
