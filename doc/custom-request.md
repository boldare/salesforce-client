Custom Request
===
## Introduction
`Xsolve\SalesforceClient\Client\SalesforceClient` can send requests which implement `Xsolve\SalesforceClient\Request\RequestInterface` to the Salesforce API. This might be useful if you'd need to add your own endpoint (for example created in Apex) or reimplement built-in objects.

## Example
Simple example of a request which will receive whole SObject by string instead of enumeration.
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
Salesforce REST API doesn't provide all the functionalities known from the SOAP API, e.g. converting a lead. In order to do such operation, you should create a REST endpoint in Apex and create custom request class. More about Apex REST endpoint you can find in [official documentation of Salesforce](https://developer.salesforce.com/page/Creating_REST_APIs_using_Apex_REST)

[↑ Table of contents ↑](/doc/README.md)

[← QueryBuilder and QueryExecutor ←](query-builder-executor.md)

[→ Custom SObject →](custom-sobject.md)
