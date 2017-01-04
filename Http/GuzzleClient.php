<?php

namespace Xsolve\SalesforceClient\Http;

use Xsolve\SalesforceClient\Http\HttpException;
use GuzzleHttp\ {
    ClientInterface as GuzzleClientInterface,
    Exception\TransferException
};
use Psr\Http\Message\ResponseInterface;

class GuzzleClient implements ClientInterface
{
    /**
     * @var GuzzleClientInterface
     */
    protected $guzzleClient;

    public function __construct(GuzzleClientInterface $guzzleClient)
    {
        $this->guzzleClient = $guzzleClient;
    }

    public function request(string $method, string $uri = '', array $options = array()): ResponseInterface
    {
        try {
            return $this->guzzleClient->request($method, $uri, $options);
        } catch (TransferException $ex) {
            throw new HttpException($ex->getMessage(), $ex->getCode(), $ex);
        }
    }
}
