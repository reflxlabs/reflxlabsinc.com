<?php

namespace Reflx\Sculpin\PressBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class PressReleasesMapPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('reflx_press.press_releases_map')) {
            return;
        }

        $definition = $container->getDefinition('reflx_press.press_releases_map');

        foreach ($container->findTaggedServiceIds('reflx_press.press_releases_map') as $id => $tagAttributes) {
            foreach ($tagAttributes as $attributes) {
                $definition->addMethodCall('addMap', array(new Reference($id)));
            }
        }
    }
}
