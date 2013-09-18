<?php

namespace Nazka\LocationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Util\CanonicalizerInterface;
use Doctrine\ORM\EntityRepository;
use Nazka\LocationBundle\Form\DataTransformer\IsoCodeToCountryDataTransformer;

/**
 * Description of CountryIsoType
 *
 * @author Javier Sampedro <jsampedro77@gmail.com>
 */
class CountryIsoType extends AbstractType
{
    private $countryRepository;

    public function __construct(EntityRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new IsoCodeToCountryDataTransformer($this->countryRepository);
        $builder->addViewTransformer($transformer);
    }

    public function getParent()
    {
        return 'text';
    }

    public function setDefaultOptions(OptionsResolverInterface $options)
    {
        $options->setDefaults(array(
            'invalid_message' => 'Invalid country conversion'
        ));
    }
    public function getName()
    {
        return 'nazka_location_country_iso_type';
    }
}
