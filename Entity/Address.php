<?php

namespace Nazka\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Address
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Address
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $name
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * @var string $name
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     * @Assert\NotNull()
     * @Serializer\Groups({"details"})
     */
    protected $address;

    /**
     * @var string $city
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     * @Assert\NotNull()
     * @Serializer\Groups({"details"})
     */
    protected $city;

    /**
     * @var string $postalCode
     * @ORM\Column(name="postal_code", type="string", length=255, nullable=true)
     * @Assert\NotNull()
     * @Serializer\Groups({"details"})
     */
    protected $postalCode;

    /**
     * @var country
     *
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="addresses", cascade={"persist"})
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id", nullable=true)
     * @Assert\NotNull()
     * @Serializer\Groups({"details"})
     */
    protected $country;

    /**
     * @var $province
     *
     * @ORM\ManyToOne(targetEntity="Province", inversedBy="addresses", cascade={"persist"})
     * @ORM\JoinColumn(name="province_id", referencedColumnName="id", nullable=true)
     * @Assert\NotNull()
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
     * @param \Nazka\LocationBundle\Entity\Country $country
     * @return Address
     */
    public function setCountry(\Nazka\LocationBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Nazka\LocationBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set province
     *
     * @param \Nazka\LocationBundle\Entity\Province $province
     * @return Address
     */
    public function setProvince(\Nazka\LocationBundle\Entity\Province $province = null)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return \Nazka\LocationBundle\Entity\Province
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
