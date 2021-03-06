<?php

namespace Nazka\LocationBundle\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Nazka\LocationBundle\Model\Province

 */
class Province
{
    /**
     * @var integer $id
     * @Serializer\Groups({"details", "list", "filter"})
     */
    protected $id;

    /**
     * @var string $name
     * @Serializer\Groups({"details", "list", "filter"})
     */
    protected $name;

    /**
     * @var string $name
     * @Serializer\Groups({"details", "list"})
     */
    protected $isoCode;

    /**
     * @var integer $country_id
     */
    protected $country;

    protected $addresses;

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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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

    /**
     * Set isoCode
     *
     * @param string $isoCode
     */
    public function setIsoCode($isoCode)
    {
        $this->isoCode = $isoCode;
    }

    /**
     * Get isoCode
     *
     * @return string
     */
    public function getIsoCode()
    {
        return $this->isoCode;
    }

    /**
     * Set country
     *
     * @param Nazka\LocationBundle\Model\Country $country
     */
    public function setCountry(\Nazka\LocationBundle\Model\Country $country)
    {
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return Nazka\LocationBundle\Model\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    public function __toString()
    {
        return $this->getName()? : '---';
    }
}
