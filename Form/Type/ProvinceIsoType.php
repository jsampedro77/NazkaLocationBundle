<?php

namespace Nazka\LocationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Util\CanonicalizerInterface;
use Doctrine\ORM\EntityRepository;
use Nazka\LocationBundle\Form\DataTransformer\IsoCodeToProvinceDataTransformer;

/**
 * Description of ProvinceIsoType
 *
 * @author Javier Sampedro <jsampedro77@gmail.com>
 */
class ProvinceIsoType extends AbstractType
{
    private $provinceRepository;

    public function __construct(EntityRepository $provinceRepository)
    {
        $this->provinceRepository = $provinceRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new IsoCodeToProvinceDataTransformer($this->provinceRepository);
        $builder->addViewTransformer($transformer);
    }

    public function getParent()
    {
        return 'text';
    }

    public function setDefaultOptions(OptionsResolverInterface $options)
    {
        $options->setDefaults(array(
            'invalid_message' => 'Invalid province conversion'
        ));
    }
    public function getName()
    {
        return 'nazka_location_province_iso_type';
    }
}
