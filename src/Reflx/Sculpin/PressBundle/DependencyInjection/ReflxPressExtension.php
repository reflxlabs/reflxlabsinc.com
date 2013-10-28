<?php

namespace Reflx\Sculpin\PressBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class ReflxPressExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration;
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('reflx_press.paths', $config['paths']);
        if (isset($config['permalink'])) {
            $container->setParameter('reflx_press.permalink', $config['permalink']);
        }
        if (isset($config['layout'])) {
            $container->setParameter('reflx_press.layout', $config['layout']);
        } else {
            $container->setParameter('reflx_press.layout', null);
        }

        if (null !== $config['publish_drafts']) {
            $container->setParameter('reflx_press.publish_drafts', $config['publish_drafts']);
        } else {
            $container->setParameter('reflx_press.publish_drafts', 'prod' !== $container->getParameter('kernel.environment'));
        }
    }
}
