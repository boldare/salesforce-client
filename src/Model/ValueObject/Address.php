<?php

namespace Xsolve\SalesforceClient\Model\ValueObject;

use JMS\Serializer\Annotation as JMS;

class Address
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     */
    protected $city;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("country")
     */
    protected $country;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("countryCode")
     */
    protected $countryCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("geocodeAccuracy")
     */
    protected $geocodeAccuracy;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\SerializedName("latitude")
     */
    protected $latitude;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\SerializedName("longitude")
     */
    protected $longitude;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("postalCode")
     */
    protected $postalCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("state")
     */
    protected $state;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("stateCode")
     */
    protected $stateCode;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("street")
     */
    protected $street;

    /**
     * @return string|null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string|null
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return string|null
     */
    public function getGeocodeAccuracy()
    {
        return $this->geocodeAccuracy;
    }

    /**
     * @return float|null
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @return float|null
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return string|null
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @return string|null
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return string|null
     */
    public function getStateCode()
    {
        return $this->stateCode;
    }

    /**
     * @return string|null
     */
    public function getStreet()
    {
        return $this->street;
    }

    public function setCity(string $city = null): self
    {
        $this->city = $city;

        return $this;
    }

    public function setCountry(string $country = null): self
    {
        $this->country = $country;

        return $this;
    }

    public function setCountryCode(string $countryCode = null): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function setGeocodeAccuracy(string $geocodeAccuracy = null): self
    {
        $this->geocodeAccuracy = $geocodeAccuracy;

        return $this;
    }

    public function setLatitude(float $latitude = null): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function setLongitude(float $longitude = null): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function setPostalCode(string $postalCode = null): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function setState(string $state = null): self
    {
        $this->state = $state;

        return $this;
    }

    public function setStateCode(string $stateCode = null): self
    {
        $this->stateCode = $stateCode;

        return $this;
    }

    public function setStreet(string $street = null): self
    {
        $this->street = $street;

        return $this;
    }
}
