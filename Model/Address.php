<?php

namespace Nazka\LocationBundle\Model;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Address
 *
 */
class Address
{

    protected $id;

    protected $name;

    /**
     * @var string $name
     * @Serializer\Groups({"details"})
     */
    protected $address;

    /**
     * @var string $city
     * @Serializer\Groups({"details"})
     */
    protected $city;

    /**
     * @var string $postalCode
     * @Serializer\Groups({"details"})
     * @Assert\NotBlank()
     */
    protected $postalCode;

    /**
     * @var country
     * @Assert\NotNull()
     * @Assert\Valid()
     * @Serializer\Groups({"details"})
     */
    protected $country;

    /**
     * @var $province
     * @Assert\NotNull(groups={"province"})
     * @Assert\Valid()
     * @Serializer\Groups({"details"})
     */
    protected $province;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Address
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Address
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

    /**
     * Set postalCode
     *
     * @param string $postalCode
     * @return Address
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set country
     *
     * @param \Nazka\LocationBundle\Model\Country $country
     * @return Address
     */
    public function setCountry(\Nazka\LocationBundle\Model\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Nazka\LocationBundle\Model\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set province
     *
     * @param \Nazka\LocationBundle\Model\Province $province
     * @return Address
     */
    public function setProvince(\Nazka\LocationBundle\Model\Province $province = null)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return \Nazka\LocationBundle\Model\Province
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Address
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        if ($this->getId()) {
            return sprintf("[%s] %s, %s, (%s, %s)", $this->getName(), $this->getAddress(), $this->getCity(), $this->getProvince(), $this->getCountry());
        } else {
            return 'new';
        }
    }
}
