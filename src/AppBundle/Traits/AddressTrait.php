<?php

namespace AppBundle\Traits;

trait AddressTrait
{
    /**
     * @var string
     *
     * @ORM\Column(name="street_number", type="string", length=255)
     */
    protected $streetNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="street_label", type="string", length=255)
     */
    protected $streetLabel;

    /**
     * @var int
     *
     * @ORM\Column(name="zip_code", type="integer")
     */
    protected $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    protected $city;

    /**
     * Set streetNumber
     *
     * @param string $streetNumber
     *
     * @return $this
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * Get streetNumber
     *
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * Set streetLabel
     *
     * @param string $streetLabel
     *
     * @return $this
     */
    public function setStreetLabel($streetLabel)
    {
        $this->streetLabel = $streetLabel;

        return $this;
    }

    /**
     * Get streetLabel
     *
     * @return string
     */
    public function getStreetLabel()
    {
        return $this->streetLabel;
    }

    /**
     * Set zipCode
     *
     * @param integer $zipCode
     *
     * @return $this
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return int
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
}