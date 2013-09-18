<?php

namespace Nazka\LocationBundle\Form\DataTransformer;

use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\Form\DataTransformerInterface;
use Doctrine\ORM\EntityRepository;
use Nazka\LocationBundle\Entity\Province;

/**
 * Transforms an 3166-2 iso code to a Province
 *
 * @author Javier Sampedro <jsampedro77@gmail.com>
 */
class IsoCodeToProvinceDataTransformer implements DataTransformerInterface
{
    private $provinceRepository;

    public function __construct(EntityRepository $provinceRepository)
    {
        $this->provinceRepository = $provinceRepository;
    }

    /**
     * Transforms the  object to a string
     * @param  Province $val
     * @return string
     */
    public function transform($val)
    {
        return $val;
    }

    /**
     * Transforms the external_id string to a Province object
     * @param  string                        $val
     * @return Province|null
     * @throws TransformationFailedException
     */
    public function reverseTransform($val)
    {
        if (!$val) {
            return null;
        }
        $province = $this->provinceRepository->findOneByIsoCode($val);
        if (!$province) {
            throw new TransformationFailedException(sprintf('A Province with ISO Code %s does not exist!', $val));
        }

        return $province;
    }
}

