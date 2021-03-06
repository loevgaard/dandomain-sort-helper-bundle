<?php
namespace Loevgaard\DandomainSortHelperBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('loevgaard_dandomain_sort_helper');

        $rootNode
            ->children()
                ->integerNode('offset')->defaultValue(0)->end()
                ->integerNode('year_begin')->defaultValue(2017)->end()
                ->scalarNode('weekday_begin')->defaultValue('sunday')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}