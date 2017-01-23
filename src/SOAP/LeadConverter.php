<?php

namespace Xsolve\SalesforceClient\SOAP;

class LeadConverter extends Object
{
    /**
     * @var array
     */
    protected $attributes;

    const LAYOUT = <<<'XML'
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:partner.soap.sforce.com">
   <soapenv:Header>
      <urn:SessionHeader>
         <urn:sessionId>:authToken:</urn:sessionId>
      </urn:SessionHeader>
   </soapenv:Header>
   <soapenv:Body>
      <urn:convertLead>
         <urn:leadConverts>
            :convertParams:
         </urn:leadConverts>
      </urn:convertLead>
   </soapenv:Body>
</soapenv:Envelope>
XML;

    public function __construct(string $authToken = '', array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->authToken = $authToken;
    }

    public function setAccountId(string $accountId): LeadConverter
    {
        $this->attributes['accountId'] = $accountId;

        return $this;
    }

    public function setLeadId(string $leadId): LeadConverter
    {
        $this->attributes['leadId'] = $leadId;

        return $this;
    }

    public function setConvertedStatus(string $convertedStatus): LeadConverter
    {
        $this->attributes['convertedStatus'] = $convertedStatus;

        return $this;
    }

    public function setContactId(string $contanctId): LeadConverter
    {
        $this->attributes['contanctId'] = $contanctId;

        return $this;
    }

    public function setOpportunityName(string $opportunityName): LeadConverter
    {
        $this->attributes['opportunityName'] = $opportunityName;

        return $this;
    }

    public function setOwnerId(string $ownerId): LeadConverter
    {
        $this->attributes['ownerId'] = $ownerId;

        return $this;
    }

    public function doNotCreateOpportunity(bool $action = true): LeadConverter
    {
        $this->attributes['doNotCreateOpportunity'] = $action;

        return $this;
    }

    public function overwriteLeadSource(bool $action = true): LeadConverter
    {
        $this->attributes['overwriteLeadSource'] = $action;

        return $this;
    }

    public function sendNotificationEmail(bool $action = true): LeadConverter
    {
        $this->attributes['sendNotificationEmail'] = $action;

        return $this;
    }

    public function getXml(): string
    {
        return str_replace(
            [
                ':authToken:',
                ':convertParams:',
            ],
            [
                $this->token,
                $this->getConvertParams(),
            ],
            self::LAYOUT
        );
    }

    protected function getConvertParams(): string
    {
        $result = '';

        foreach ($this->attributes as $attribute => $value) {
            $result .= sprintf('<urn:%1$s>%2$s</urn:%1$s>%3$s', $attribute, $value, PHP_EOL);
        }

        return $result;
    }
}
