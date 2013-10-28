<?php

namespace Reflx\Sculpin\PressBundle;

use Reflx\Sculpin\PressBundle\DependencyInjection\Compiler\PressReleasesMapPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ReflxPressBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new PressReleasesMapPass);
    }
}
