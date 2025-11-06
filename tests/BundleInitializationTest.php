<?php

declare(strict_types=1);

namespace Ajgarlag\Bundle\FoobarBundle\Tests;

use Ajgarlag\Bundle\FoobarBundle\Controller\FoobarController;
use Ajgarlag\Bundle\FoobarBundle\EventListener\FoobarListener;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class BundleInitializationTest extends KernelTestCase
{
    use KernelTestCaseTrait;

    public function testInitBundle(): void
    {
        self::bootKernel(self::getDefaultKernelOptions());
        $container = self::getContainer();

        $this->assertTrue($container->has('ajgarlag.foobar.listener.foobar'));
        $this->assertInstanceOf(FoobarListener::class, $container->get('ajgarlag.foobar.listener.foobar'));
        $this->assertTrue($container->has(FoobarListener::class));

        $this->assertTrue($container->has('ajgarlag.foobar.controller.foobar'));
        $this->assertInstanceOf(FoobarController::class, $container->get('ajgarlag.foobar.controller.foobar'));
        $this->assertTrue($container->has(FoobarController::class));
    }
}
