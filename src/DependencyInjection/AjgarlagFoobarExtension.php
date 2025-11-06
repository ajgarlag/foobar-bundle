<?php

declare(strict_types=1);

namespace Ajgarlag\Bundle\FoobarBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

final class AjgarlagFoobarExtension extends Extension
{
    public function getAlias(): string
    {
        return 'ajgarlag_foobar';
    }

    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new PhpFileLoader($container, new FileLocator(__DIR__ . '/../../config'));
        $loader->load('services.php');

        $config = $this->processConfiguration(new Configuration(), $configs);
    }
}
