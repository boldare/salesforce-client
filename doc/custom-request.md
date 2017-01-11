Custom Request
===
## Introduction
`Xsolve\SalesforceClient\Client\SalesforceClient` can send everything what implements `Xsolve\SalesforceClient\Request\RequestInterface`. It can be usefull if you need to add your own endpoint (for example created in Apex) or reimplement built-in objects.

## Example
Simple example of request which will receive whole SObject by string instead of enumeration.
```php
namespace App;

use Xsolve\SalesforceClient\Request\RequestInterface;
use Xsolve\SalesforceClient\Request\Get;

class CustomGet implements RequestInterface
{

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $id;

	public function __construct(string $name, string $id)
	{
		$this->name = $name;
		$this->id = $id;
	}

    /**
     * {@inheritdoc}
     */
    public function getEndpoint(): string
    {
        return sprintf(Get::ENDPOINT, $this->name, $this->id);
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod(): string
    {
        return self::METHOD_GET;
    }

    /**
     * {@inheritdoc}
     */
    public function getParams(): array
    {
	    return [];
    }
}
```

## Tip
Salesforce REST API don't contain all functionalities which can be found in SOAP API. Example here can be convert lead. To do something like that we need to create REST endpoint in Apex and create custom request to handle that. More about Apex REST endpoint you can find in official documentation of salesforce (https://developer.salesforce.com/page/Creating_REST_APIs_using_Apex_REST)
