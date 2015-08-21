<?php

namespace Symfonian\Indonesia\CoreBundle\Toolkit\DoctrineManager;

use Symfonian\Indonesia\BundlePlugins\Plugin;

class MicroCachePlugin extends Plugin
{
    public function load(array $pluginConfiguration, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/Resources/config'));
        $loader->load('services.yml');
    }
}
