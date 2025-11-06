<?php

declare(strict_types=1);

namespace Ajgarlag\Bundle\FoobarBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\UriSigner;
use Twig\Environment;

final class FoobarController
{
    public function __construct(
        private readonly UriSigner $uriSigner,
        private readonly Environment $twigEnvironment,
    ) {
    }

    public function __invoke(
        Request $request,
    ): Response {
        return new Response($this->twigEnvironment->render(
            '@AjgarlagFoobar/foobar.html.twig', ['signed' => $this->uriSigner->checkRequest($request)])
        );
    }

}
