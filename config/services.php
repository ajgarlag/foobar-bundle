<?php

declare(strict_types=1);

use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

use Ajgarlag\Bundle\FoobarBundle\Controller\FoobarController;
use Ajgarlag\Bundle\FoobarBundle\EventListener\FoobarListener;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container): void {
    $container->services()
        ->set('ajgarlag.foobar.listener.foobar', FoobarListener::class)
            ->args([
                service('uri_signer'),
                service('security.helper'),
            ])
            ->tag('kernel.event_subscriber')
        ->alias(FoobarListener::class, 'ajgarlag.foobar.listener.foobar')

        ->set('ajgarlag.foobar.controller.foobar', FoobarController::class)
            ->args([
                service('uri_signer'),
                service('twig'),
            ])
            ->tag('controller.service_arguments')
        ->alias(FoobarController::class, 'ajgarlag.foobar.controller.foobar')
    ;
};
