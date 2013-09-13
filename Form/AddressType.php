<?php

namespace Nazka\LocationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('required' => true))
            ->add('address', null, array('required' => true))
            ->add('city', null, array('required' => true))
            ->add('postalCode', null, array('required' => true))
            ->add('country', null, array('required' => true))
            ->add('zone', null, array('required' => true))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nazka\LocationBundle\Entity\Address'
        ));
    }

    public function getName()
    {
        return 'nazka_locationbundle_addresstype';
    }
}
