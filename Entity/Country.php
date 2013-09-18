<?php

namespace Nazka\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @Gedmo\TranslationEntity(class="Nazka\LocationBundle\Entity\CountryTranslation")
 * @ORM\Table()
 * @ORM\Entity
 */
class Country
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $name
     * @Gedmo\Translatable
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var string $name
     *
     * @ORM\Column(name="iso_code", type="string", length=2)
     */
    private $isoCode;

    /**
     * @ORM\OneToMany(targetEntity="Province", mappedBy="country",  cascade={"persist"})
     */
    protected $provinces;

    /**
     * @ORM\OneToMany(targetEntity="Address", mappedBy="country")
     */
    protected $addresses;

    /**
     * @ORM\OneToMany(targetEntity="CountryTranslation", mappedBy="object", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $translations;

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

    public function __construct()
    {
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->provinces = new \Doctrine\Common\Collections\ArrayCollection();
        $this->translations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add Address
     * 
     * @param \Nazka\LocationBundle\Entity\Address $address
     */
    public function addAddress(\Nazka\LocationBundle\Entity\Address $address)
    {
        $this->addresses[] = $address;
        $address->setCountry($this);
    }

    /**
     *
     * @return type
     */
    public function getProvinces()
    {
        return $this->provinces;
    }

    /**
     * Add provinces
     *
     * @param Nazka\LocationBundle\Entity\Province $provinces
     */
    public function addProvince(\Nazka\LocationBundle\Entity\Province $provinces)
    {
        $this->provinces[] = $provinces;
        $provinces->setCountry($this);
    }

    public function addProvinces(\Nazka\LocationBundle\Entity\Province $provinces)
    {
        $this->addProvince($provinces);
    }

    public function __toString()
    {
        return $this->getName()? : '---';
    }

    /**
     * Add translations
     *
     * @param Nazka\LocationBundle\Entity\CountryTranslation $translations
     * @return Country
     */
    public function addTranslation(\Nazka\LocationBundle\Entity\CountryTranslation $translations)
    {
        $this->translations[] = $translations;
        $translations->setObject($this);
        return $this;
    }

    /**
     * Remove translations
     *
     * @param Nazka\LocationBundle\Entity\CountryTranslation $translations
     */
    public function removeTranslation(\Nazka\LocationBundle\Entity\CountryTranslation $translations)
    {
        $this->translations->removeElement($translations);
    }

    /**
     * Get translations
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTranslations()
    {
        return $this->translations;
    }
}