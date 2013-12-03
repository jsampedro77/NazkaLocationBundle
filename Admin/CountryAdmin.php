<?php

namespace Nazka\LocationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class CountryAdmin extends Admin
{
    //Last components first in List
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'ASC', // sort direction
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
                ->addIdentifier('isoCode', null, array(
                    'label' => $this->trans('iso.code', array(), 'location-bundle')
                ))
                ->add('enabled', null, array(
                    'label' => $this->trans('enabled', array(), 'location-bundle'),
                    'editable' => true
                ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('name', null, array('label' => $this->trans('name', array(), 'location-bundle')))
                ->add('enabled', null, array(
                    'label' => $this->trans('enabled', array(), 'location-bundle'),
                    'editable' => true
                ))
        ;
    }

    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
                ->add('name', null, array('label' => $this->trans('name', array(), 'location-bundle')))
                ->add('isoCode', null, array(
                    'label' => $this->trans('iso.code', array(), 'location-bundle')
                ))
                ->add('enabled', null, array(
                    'label' => $this->trans('enabled', array(), 'location-bundle'),
                    'editable' => true
                ))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
                ->add('name', null, array('label' => $this->trans('name', array(), 'location-bundle')))
                ->add('isoCode', null, array(
                    'label' => $this->trans('iso.code', array(), 'location-bundle')
                ))
                ->add('enabled', null, array(
                    'label' => $this->trans('enabled', array(), 'location-bundle')
                ))
                ->add('translations', 'a2lix_translations_gedmo', array('translatable_class' => $this->getClass(),
                    'by_reference' => false,
                    'fields' => array(
                        'name' => array('label' => $this->trans('name', array(), 'location-bundle')),
            )))
                ->add('provinces', 'sonata_type_collection', array(
                    'required' => false,
                    'by_reference' => false,
                    'label' => $this->trans('provinces', array(), 'location-bundle')
                        ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'link_parameters' => array('context' => 'default'),
                    'help' => $this->trans('add.province', array(), 'location-bundle')
                        )
                )
        ;
    }
}
