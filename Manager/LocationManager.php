<?php

namespace Nazka\LocationBundle\Manager;

use Doctrine\Common\Persistence\ObjectRepository;


/**
 * Description of LocationManager
 *
 * @author Javier Sampedro <jsampedro77@gmail.com>
 */
class LocationManager
{
    protected $countryRepository;
    protected $provinceRepository;

    public function __construct(ObjectRepository $countryRepository, ObjectRepository $provinceRepository)
    {
        $this->countryRepository = $countryRepository;
        $this->provinceRepository = $provinceRepository;
    }

    public function findCountryByIso($isoCode)
    {
        return $this->countryRepository->findOneBy(array('isoCode' => $isoCode, 'enabled' => true));
    }

    public function findProvinceByIso($isoCode)
    {
        return $this->provinceRepository->findOneByIsoCode($isoCode);
    }
}
