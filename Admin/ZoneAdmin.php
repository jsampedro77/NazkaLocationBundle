<?php

namespace Nazka\LocationBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class ZoneAdmin extends Admin
{

    //Last components first in List
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC', // sort direction
        '_sort_by' => 'name' // field name
    );


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
        $stateChoices = new StateChoices();

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
        ;
    }

}
