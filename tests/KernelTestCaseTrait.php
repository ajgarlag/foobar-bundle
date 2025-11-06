<?php

declare(strict_types=1);

namespace Ajgarlag\Bundle\FoobarBundle\Tests;

use Ajgarlag\Bundle\FoobarBundle\AjgarlagFoobarBundle;
use Nyholm\BundleTest\TestKernel;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\HttpKernel\KernelInterface;

trait KernelTestCaseTrait
{
    protected static function getKernelClass(): string
    {
        return TestKernel::class;
    }

    protected static function createKernel(array $options = []): KernelInterface
    {
        $kernel = parent::createKernel($options);
        $kernel->addTestBundle(SecurityBundle::class);
        $kernel->addTestBundle(AjgarlagFoobarBundle::class);
        $kernel->addTestBundle(TwigBundle::class);
        $kernel->handleOptions($options);

        return $kernel;
    }

    private static function getDefaultKernelOptions(): array
    {
        return ['config' => static function (TestKernel $kernel): void {
            $kernel->addTestConfig(__DIR__ . '/Fixtures/config/services.yaml');
            $kernel->addTestConfig(__DIR__ . '/Fixtures/config/packages/framework.yaml');
            $kernel->addTestConfig(__DIR__ . '/Fixtures/config/packages/security.yaml');
            $kernel->addTestConfig(__DIR__ . '/Fixtures/config/packages/twig.yaml');

            $kernel->addTestRoutingFile(__DIR__ . '/Fixtures/config/routes.yaml');
            $kernel->addTestRoutingFile(__DIR__ . '/Fixtures/config/routes/ajgarlag_foobar.yaml');
            $kernel->addTestRoutingFile(__DIR__ . '/Fixtures/config/routes/security.yaml');
        }];
    }
}
