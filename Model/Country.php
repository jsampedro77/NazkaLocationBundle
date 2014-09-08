<?php

namespace Nazka\LocationBundle\Model;

use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Translatable\Translatable;
use JMS\Serializer\Annotation as Serializer;

class Country implements Translatable
{

    /**
     * @var integer $id
     *
     */
    protected $id;

    /**
     * @var string $name
     * @Gedmo\Translatable
     * @Serializer\Groups({"details"})
     */
    protected $name;

    /**
     * @var string $name
     * @Serializer\Groups({"details"})
     */
    protected $isoCode;
    
    protected $provinces;
    
    protected $addresses;

    /**
     * @var string $enabled
     * @Serializer\Groups({"details"})
     */
    protected $enabled = false;

    /**
     * @var integer
     * @Serializer\Groups({"details"})
     */
    protected $priority;

    /**
     * @Gedmo\Locale
     */
    private $locale;

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
     * Set priority
     *
     * @param string $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * Get priority
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
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
     * Set enabled
     *
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    public function __construct()
    {
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->provinces = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add Address
     * 
     * @param \Nazka\LocationBundle\Model\Address $address
     */
    public function addAddress(\Nazka\LocationBundle\Model\Address $address)
    {
        $this->addresses[] = $address;
        $address->setCountry($this);
    }

    /**
     *
     * @return Nazka\LocationBundle\Model\Province
     */
    public function getProvinces()
    {
        return $this->provinces;
    }

    /**
     * Add provinces
     *
     * @param Nazka\LocationBundle\Model\Province $provinces
     */
    public function addProvince(\Nazka\LocationBundle\Model\Province $provinces)
    {
        $this->provinces[] = $provinces;
        $provinces->setCountry($this);
    }

    public function removeProvince(\Nazka\LocationBundle\Model\Province $provinces)
    {
        $this->provinces->removeElement($provinces);
    }

    public function __toString()
    {
        return $this->getName()? : '---';
    }

    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }
}
