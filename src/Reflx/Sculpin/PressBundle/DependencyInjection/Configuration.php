<?php

namespace Reflx\Sculpin\PressBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder;

        $rootNode = $treeBuilder->root('reflx_press');

        $rootNode
            ->children()
                ->arrayNode('paths')
                    ->defaultValue(array('_press'))
                    ->prototype('scalar')->end()
                ->end()
                ->booleanNode('publish_drafts')->defaultNull()->end()
                ->scalarNode('permalink')->defaultValue('pretty')->end()
                ->scalarNode('layout')->defaultValue('pressRelease')->end()
            ->end();

        return $treeBuilder;
    }
}
