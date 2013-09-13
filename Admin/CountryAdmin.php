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
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
                ->add('name', null, array(/** @Ignore */'label' => $this->trans('name', array(), 'common')))
                ->add('translations', 'a2lix_translations_gedmo', array(                     'translatable_class' => $this->getClass(),
                    'by_reference' => false,
                    'fields' => array(
                        'name' => array(/** @Ignore */'label' => $this->trans('name', array(), 'common')),
                        )))
                ->add('zones', 'sonata_type_collection', array(
                    'required' => false,
                    'by_reference' => false,
                    /** @Ignore */'label' => $this->trans('zones', array(), 'common')
                        ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'link_parameters' => array('context' => 'default'),
                    'help' => $this->trans('add.zone', array(), 'admin')
                        )
                )
        ;
    }

}
