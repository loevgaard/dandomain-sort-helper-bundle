<?php
namespace Loevgaard\DandomainPeriodHelperBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('loevgaard_dandomain_period_helper');

        $rootNode
            ->children()
                ->integerNode('offset')
                    ->defaultValue(0)->end()
                ->end()
                ->integerNode('year_begin')
                    ->defaultValue(2017)->end()
                ->end()
                ->scalarNode('period_weekday_begin')
                    ->defaultValue('sunday')->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}