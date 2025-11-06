<?php

declare(strict_types=1);

namespace Ajgarlag\Bundle\FoobarBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('ajgarlag_foobar');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode->append($this->createFoobarNode());

        return $treeBuilder;
    }

    private function createFoobarNode(): NodeDefinition
    {
        $treeBuilder = new TreeBuilder('foobar');
        $node = $treeBuilder->getRootNode();

        $node
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('foo')
                    ->info('Foo parameter')
                    ->defaultValue('bar')
                ->end()
                ->scalarNode('bar')
                    ->info('Bar parameter')
                    ->defaultValue('foo')
                ->end()
            ->end()
        ;

        return $node;
    }
}
