<?php

namespace Nazka\LocationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class AddressAdmin extends Admin
{

    //Last components first in List
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC', // sort direction
        '_sort_by' => 'name' // field name
    );

    protected function configureRoutes(RouteCollection $collection)
    {
        
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('name', null, array(
                    /** @Ignore */'label' => $this->trans('name', array(), 'common')
                ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('name', null, array(/** @Ignore */'label' => $this->trans('name', array(), 'common')))
        ;
    }

    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
                ->add('name', null, array(/** @Ignore */'label' => $this->trans('name', array(), 'common')))
                ->add('address', null, array(/** @Ignore */'label' => $this->trans('address', array(), 'common')))
                ->add('city', null, array(/** @Ignore */'label' => $this->trans('city', array(), 'common')))
                ->add('postalCode', null, array(/** @Ignore */'label' => $this->trans('postal.code', array(), 'common')))
                ->add('country', null, array(/** @Ignore */'label' => $this->trans('country', array(), 'common')))
                ->add('zone', null, array(/** @Ignore */'label' => $this->trans('zone', array(), 'common')))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
                ->add('name', null, array(/** @Ignore */'label' => $this->trans('name', array(), 'common'),'attr' => array('class' => 'span12')))
                ->add('address', null, array(/** @Ignore */'label' => $this->trans('address', array(), 'common'),'attr' => array('class' => 'span12')))
                ->add('city', null, array(/** @Ignore */'label' => $this->trans('city', array(), 'common'),'attr' => array('class' => 'span12')))
                ->add('postalCode', null, array(/** @Ignore */'label' => $this->trans('postal.code', array(), 'common'),'attr' => array('class' => 'span12')))
                ->add('country', null, array(/** @Ignore */'label' => $this->trans('country', array(), 'common'),'attr' => array('class' => 'span12')))
                ->add('zone', null, array(/** @Ignore */'label' => $this->trans('zone', array(), 'common'),'attr' => array('class' => 'span12')))
        ;
    }

}
