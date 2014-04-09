<?php

namespace Nazka\LocationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('nazka_location');

        $rootNode
            ->children()
                ->arrayNode('sonata_admin')
                    ->canBeEnabled()
                ->end()
                ->scalarNode('manager')
                    ->defaultValue('orm')
                    ->validate()
                    ->ifNotInArray(array('orm', 'mongodb'))
                    ->thenInvalid('Invalid manager')
                ->end()
            ->end()
        ->end()
        ;
        return $treeBuilder;
    }
}
