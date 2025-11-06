<?php

declare(strict_types=1);

namespace Ajgarlag\Bundle\FoobarBundle\EventListener;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\UriSigner;
use Symfony\Component\HttpKernel\Event\RequestEvent;

final class FoobarListener implements EventSubscriberInterface
{
    public function __construct(
        private readonly UriSigner $uriSigner,
        private readonly Security $security,
    ) {
    }

    public function onRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        if (null === $user = $this->security->getUser()) {
            return;
        }

        if (!$event->getRequest()->isMethodSafe()) {
            return;
        }

        $redirectUri = $this->uriSigner->sign($request->getUri());

        $event->setResponse(
            new RedirectResponse($redirectUri)
        );
    }

    public static function getSubscribedEvents(): array
    {
        return [
            RequestEvent::class => 'onRequest',
        ];
    }
}
