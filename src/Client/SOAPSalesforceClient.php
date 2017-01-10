<?php

namespace Xsolve\SalesforceClient\Client;

use Psr\Http\Message\ResponseInterface;
use Xsolve\SalesforceClient\Client\Exception\ParsingFailedException;
use Xsolve\SalesforceClient\Client\Exception\RequestException;
use Xsolve\SalesforceClient\Http\HttpException;
use Xsolve\SalesforceClient\Request\RequestInterface;
use Xsolve\SalesforceClient\Request\SOAP;
use Xsolve\SalesforceClient\Security\Token\TokenInterface;

class SOAPSalesforceClient extends AbstractSalesforceClient
{
    const PREFIX = 'services/Soap/u/';
    const UNAUTHORIZED = 'INVALID_SESSION_ID';

    /**
     * {@inheritdoc}
     */
    protected function isUnauthorized(HttpException $ex): bool
    {
        if (!(strpos($ex->getMessage(), self::UNAUTHORIZED) === false)) {
            return true;
        }

        $prev = $ex->getPrevious();

        if (!method_exists($prev, 'getResponse')) {
            return false;
        }

        $response = $prev->getResponse();

        if (!$response instanceof ResponseInterface) {
            return false;
        }

        return !(strpos($response->getBody(), self::UNAUTHORIZED) === false);
    }

    /**
     * {@inheritdoc}
     */
    protected function sendRequest(TokenInterface $token, RequestInterface $request): ResponseInterface
    {
        if ($request instanceof SOAP) {
            $request->setToken($token->getAccessToken());
        }

        return $this->client->request(
            $request->getMethod(),
            sprintf(
                '%s/%s',
                rtrim($token->getInstanceUrl(), '/'),
                sprintf('%s%s/%s', self::PREFIX, $this->version, ltrim($request->getEndpoint(), '/'))
            ),
            array_merge(
                [
                    'headers' => [
                        'SOAPAction' => self::PREFIX, // This value cannot be empty
                        'Content-type' => 'text/xml',
                    ],
                ],
                $request->getParams()
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function toArray(ResponseInterface $response): array
    {
        libxml_use_internal_errors(true);
        $xml = simplexml_load_string(strtr((string) $response->getBody(), [' xmlns:' => ' ', 'xsi:nil="true"' => '']), \SimpleXMLElement::class, LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, true);

        if (!is_array($array)) {
            throw new ParsingFailedException('Cannot parse response.');
        }

        if (!isset($array['soapenv:Body']) || !isset($array['soapenv:Body'])) {
            throw new ParsingFailedException('Response body does not exits.');
        }

        $arrayResponse = current($array['soapenv:Body']);

        if (!is_array($arrayResponse) || !isset($arrayResponse['result'])) {
            throw new ParsingFailedException('Empty response body.');
        }

        return $this->handleResponse($arrayResponse['result']);
    }

    protected function handleResponse(array $arrayResponse): array
    {
        if (!isset($arrayResponse['errors'])) {
            return $arrayResponse;
        }

        if (empty($arrayResponse['errors'])) {
            return $arrayResponse;
        }

        throw new RequestException($arrayResponse['errors']['message']);
    }
}
