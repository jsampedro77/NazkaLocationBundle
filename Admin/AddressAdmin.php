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
                    'label' => $this->trans('name', array(), 'location-bundle')
                ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('name', null, array('label' => $this->trans('name', array(), 'location-bundle')))
        ;
    }

    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
                ->add('name', null, array('label' => $this->trans('name', array(), 'location-bundle')))
                ->add('address', null, array('label' => $this->trans('address', array(), 'location-bundle')))
                ->add('city', null, array('label' => $this->trans('city', array(), 'location-bundle')))
                ->add('postalCode', null, array('label' => $this->trans('postal.code', array(), 'location-bundle')))
                ->add('country', null, array('label' => $this->trans('country', array(), 'location-bundle')))
                ->add('province', null, array('label' => $this->trans('zone', array(), 'location-bundle')))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
                ->add('name', null, array('label' => $this->trans('name', array(), 'location-bundle'),'attr' => array('class' => 'span12')))
                ->add('address', null, array('label' => $this->trans('address', array(), 'location-bundle'),'attr' => array('class' => 'span12')))
                ->add('city', null, array('label' => $this->trans('city', array(), 'location-bundle'),'attr' => array('class' => 'span12')))
                ->add('postalCode', null, array('label' => $this->trans('postal.code', array(), 'location-bundle'),'attr' => array('class' => 'span12')))
                ->add('country', null, array('label' => $this->trans('country', array(), 'location-bundle'),'attr' => array('class' => 'span12')))
                ->add('province', null, array('label' => $this->trans('zone', array(), 'location-bundle'),'attr' => array('class' => 'span12')))
        ;
    }

}
