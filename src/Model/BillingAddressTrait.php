<?php

namespace Xsolve\SalesforceClient\Model;

use Xsolve\SalesforceClient\Model\ValueObject\Address;
use JMS\Serializer\Annotation as JMS;

trait BillingAddressTrait
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $billingStreet;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $billingCity;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $billingState;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $billingPostalCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\Groups({"update", "create"})
     */
    protected $billingCountry;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $billingLatitude;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\Groups({"update", "create"})
     */
    protected $billingLongitude;

    /**
     * @var Address|null
     * @JMS\Type("Xsolve\SalesforceClient\Model\ValueObject\Address")
     */
    protected $billingAddress;

    /**
     * @return Address|null
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(Address $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * Because BillingAddress is not writtable.
     *
     * @JMS\PreSerialize
     */
    public function updateBillingAddress()
    {
        if (!$this->billingAddress instanceof Address) {
            return;
        }

        $this->billingCity = $this->billingAddress->getCity();
        $this->billingCountry = $this->billingAddress->getCountry();
        $this->billingLatitude = $this->billingAddress->getLatitude();
        $this->billingLongitude = $this->billingAddress->getLongitude();
        $this->billingPostalCode = $this->billingAddress->getPostalCode();
        $this->billingState = $this->billingAddress->getState();
        $this->billingStreet = $this->billingAddress->getStreet();
    }
}
