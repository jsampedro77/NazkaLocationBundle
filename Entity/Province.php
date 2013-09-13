<?php

namespace Nazka\LocationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer $country_id
     *
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="provinces")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity="Province", mappedBy="province")
     */
    protected $provinces;

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
