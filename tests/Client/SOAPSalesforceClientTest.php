<?php

namespace Xsolve\SalesforceClient\Client;

use Psr\Http\Message\ResponseInterface;
use Xsolve\SalesforceClient\Client\Exception\ParsingFailedException;
use Xsolve\SalesforceClient\Client\Exception\RequestException;
use Xsolve\SalesforceClient\Http\HttpException;
use Xsolve\SalesforceClient\Request\RequestInterface;

class SOAPSalesforceClientTest extends AbstractSalesforceClientTest
{
    /**
     * @var SOAPSalesforceClient
     */
    protected $salesforceClient;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $this->salesforceClient = new SOAPSalesforceClient($this->httpClient, $this->tokenGenerator, 'v00.0');
    }

    /**
     * @dataProvider invalidResponseProvider
     */
    public function testInvalidResponse(string $class, string $responseBody)
    {
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')->willReturn($responseBody);

        $this->httpClient->method('request')->willReturn($response);

        try {
            $this->salesforceClient->doRequest($this->createMock(RequestInterface::class));
        } catch (Exception\SOAPException $ex) {
            $this->assertInstanceOf($class, $ex);
        }
    }

    public function testExpiredTokenFlow()
    {
        $this->httpClient->expects($this->at(0))->method('request')->will($this->throwException(new HttpException(SOAPSalesforceClient::UNAUTHORIZED, 500)));
        $this->httpClient->expects($this->at(1))->method('request')->willReturn($this->getValidResponse());

        $result = $this->salesforceClient->doRequest($this->createMock(RequestInterface::class));

        $this->assertInternalType('array', $result);
    }

    /**
     * @expectedException \Xsolve\SalesforceClient\Http\HttpException
     */
    public function testInvalidToken()
    {
        $this->httpClient->expects($this->at(0))->method('request')->will($this->throwException(new HttpException('')));

        $this->salesforceClient->doRequest($this->createMock(RequestInterface::class));
    }

    public function testValidToken()
    {
        $this->httpClient->method('request')->willReturn($this->getValidResponse());

        $result = $this->salesforceClient->doRequest($this->createMock(RequestInterface::class));

        $this->assertInternalType('array', $result);
    }

    public function invalidResponseProvider(): array
    {
        return [
            [
                ParsingFailedException::class,
                '',
            ],
            [
                ParsingFailedException::class,
                'randomString',
            ],
            [
                ParsingFailedException::class,
                '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                </soapenv:Envelope>',
            ],
            [
                ParsingFailedException::class,
                '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                     <soapenv:Body>
                     </soapenv:Body>
                </soapenv:Envelope>',
            ],
            [
                ParsingFailedException::class,
                '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                     <soapenv:Body>
                      <convertLeadResponse xmlns="urn:partner.soap.sforce.com">
                      </convertLeadResponse>
                     </soapenv:Body>
                </soapenv:Envelope>',
            ],
            [
                RequestException::class,
                '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                     <soapenv:Body>
                      <convertLeadResponse xmlns="urn:partner.soap.sforce.com">
                       <result>
                        <accountId xsi:nil="true"/>
                        <contactId xsi:nil="true"/>
                        <errors>
                         <fields xsi:nil="true"/>
                         <message>cannot reference converted lead</message>
                         <statusCode>CANNOT_UPDATE_CONVERTED_LEAD</statusCode>
                        </errors>
                        <leadId></leadId>
                        <opportunityId xsi:nil="true"/>
                        <success>false</success>
                       </result>
                      </convertLeadResponse>
                     </soapenv:Body>
                </soapenv:Envelope>',
            ],
        ];
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|ResponseInterface
     */
    protected function getValidResponse()
    {
        $response = $this->createMock(ResponseInterface::class);
        $response->method('getBody')->willReturn($this->getValidResponseContent());

        return $response;
    }

    protected function getValidResponseContent(): string
    {
        return <<<'XML'
        <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
 <soapenv:Body>
  <convertLeadResponse xmlns="urn:partner.soap.sforce.com">
   <result>
    <accountId xsi:nil="true"/>
    <contactId xsi:nil="true"/>
    <leadId></leadId>
    <opportunityId xsi:nil="true"/>
    <success>true</success>
   </result>
  </convertLeadResponse>
 </soapenv:Body>
</soapenv:Envelope>
XML;
    }
}
