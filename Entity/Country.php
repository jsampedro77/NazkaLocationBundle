<?php

namespace Nazka\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Nazka\LocationBundle\Entity\Country
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
     * @ORM\OneToMany(targetEntity="Province", mappedBy="country",  orphanRemoval=true,  cascade={"persist"})
     */
    protected $provinces;

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

    public function __construct()
    {
        $this->provinces = new \Doctrine\Common\Collections\ArrayCollection();
        $this->translations = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Get provinces
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getProvinces()
    {
        return $this->provinces;
    }

    /**
     * Add users
     *
     * @param Nazka\UserBundle\Entity\User $users
     */
    public function addUser(\Nazka\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function __toString()
    {
        return $this->getName()? : '---';
    }

    /**
     * Remove provinces
     *
     * @param Nazka\LocationBundle\Entity\Province $provinces
     */
    public function removeProvince(\Nazka\LocationBundle\Entity\Province $provinces)
    {
        $this->provinces->removeElement($provinces);
    }

    /**
     * Remove users
     *
     * @param Nazka\UserBundle\Entity\User $users
     */
    public function removeUser(\Nazka\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
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