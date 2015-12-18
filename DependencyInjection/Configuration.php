<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\CurrencyExchangeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ongr_currency_exchange');

        $rootNode
            ->children()
                ->scalarNode('es_manager')
                    ->defaultValue('default')
                    ->info('Elasticsearch manager to use in router')
                    ->example('product')
                ->end()
                ->scalarNode('default_currency')
                    ->defaultValue('EUR')
                    ->info('set default currency')
                ->end()
                ->scalarNode('cache')
                    ->isRequired()
                    ->info('set cache pool service id')
                    ->example('stash.memcache')
                ->end()
                ->arrayNode('currencies')
                    ->useAttributeAsKey('name')
                    ->prototype('scalar')
                    ->end()
                ->end()
                ->arrayNode('separators')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('decimal')
                            ->defaultValue(',')
                        ->end()
                        ->scalarNode('thousands')
                            ->defaultValue('.')
                        ->end()
                    ->end()
                ->end()
                ->scalarNode('driver')
                    ->defaultValue('ongr_currency_exchange.ecb_driver')
                    ->info('Elasticsearch manager to use in router')
                ->end()
                ->scalarNode('open_exchange_rates_api_id')
                    ->defaultNull()
                    ->info('Open Exchange Rates API ID')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
