<?php

namespace Xsolve\SalesforceClient\Model;

use JMS\Serializer\Annotation as JMS;
use Xsolve\SalesforceClient\Model\ValueObject\Address;

trait ShippingAddressTrait
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $shippingStreet;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $shippingCity;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $shippingState;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $shippingPostalCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $shippingCountry;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $shippingLatitude;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $shippingLongitude;

    /**
     * @var Address|null
     * @JMS\Type("Xsolve\SalesforceClient\Model\ValueObject\Address")
     */
    protected $shippingAddress;

    /**
     * @return Address|null
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(Address $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    /**
     * Because ShippingAddress is not writable.
     *
     * @JMS\PreSerialize
     */
    public function updateShippingAddress()
    {
        if (!$this->shippingAddress instanceof Address) {
            return;
        }

        $this->shippingCity = $this->shippingAddress->getCity();
        $this->shippingCountry = $this->shippingAddress->getCountry();
        $this->shippingLatitude = $this->shippingAddress->getLatitude();
        $this->shippingLongitude = $this->shippingAddress->getLongitude();
        $this->shippingPostalCode = $this->shippingAddress->getPostalCode();
        $this->shippingState = $this->shippingAddress->getState();
        $this->shippingStreet = $this->shippingAddress->getStreet();
    }
}
