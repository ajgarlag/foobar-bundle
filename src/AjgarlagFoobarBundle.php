<?php

declare(strict_types=1);

namespace Ajgarlag\Bundle\FoobarBundle;

use Ajgarlag\Bundle\FoobarBundle\DependencyInjection\AjgarlagFoobarExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class AjgarlagFoobarBundle extends Bundle
{
    public function getContainerExtension(): ExtensionInterface
    {
        return new AjgarlagFoobarExtension();
    }

    public function getPath(): string
    {
        $reflected = new \ReflectionObject($this);

        return \dirname($reflected->getFileName() ?: __FILE__, 2);
    }
}
