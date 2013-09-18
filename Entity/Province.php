<?php

namespace Nazka\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Nazka\LocationBundle\Entity\Province
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Province
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
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Serializer\Groups({"details"})
     */
    protected $name;

    /**
     * @var string $name
     *
     * @ORM\Column(name="iso_code", type="string", length=6)
     * @Serializer\Groups({"details"})
     */
    protected $isoCode;

    /**
     * @var integer $country_id
     *
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="provinces")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    protected $country;

    /**
     * @ORM\OneToMany(targetEntity="Address", mappedBy="province")
     */
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

    public function __construct()
    {

    }

    /**
     * Set country
     *
     * @param Nazka\LocationBundle\Entity\Country $country
     */
    public function setCountry(\Nazka\LocationBundle\Entity\Country $country)
    {
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return Nazka\LocationBundle\Entity\Country
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
