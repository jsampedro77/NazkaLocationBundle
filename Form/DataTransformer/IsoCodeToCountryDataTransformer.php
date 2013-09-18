<?php

namespace Nazka\LocationBundle\Form\DataTransformer;

use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\Form\DataTransformerInterface;
use Doctrine\ORM\EntityRepository;
use Nazka\LocationBundle\Entity\Country;

/**
 * Transforms an 3166-1 iso code to a Country
 *
 * @author Javier Sampedro <jsampedro77@gmail.com>
 */
class IsoCodeToCountryDataTransformer implements DataTransformerInterface
{
    private $countryRepository;

    public function __construct(EntityRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * Transforms the  object to a string
     * @param  Country $val
     * @return string
     */
    public function transform($val)
    {
        return $val;
    }

    /**
     * Transforms the external_id string to a Country object
     * @param  string                        $val
     * @return Country|null
     * @throws TransformationFailedException
     */
    public function reverseTransform($val)
    {
        if (!$val) {
            return null;
        }
        $country = $this->countryRepository->findOneByIsoCode($val);
        if (!$country) {
            throw new TransformationFailedException(sprintf('A Country with ISO Code %s does not exist!', $val));
        }

        return $country;
    }
}

