<?php

declare(strict_types=1);

namespace Ajgarlag\Bundle\FoobarBundle\Tests\Acceptance;

final class FoobarEndpointTest extends AbstractAcceptanceTestCase
{
    public function testAnonymousFoobarRequest(): void
    {
        $client = self::createClient();

        $client->request('GET', '/foobar');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextSame('title', 'Foobar page');
        $this->assertSelectorTextSame('#signed', 'No');
    }

    public function testFoobarAuthorizedRequest(): void
    {
        $client = self::createClient();
        $client->loginUser($this->getUser());

        $client->request('GET', '/foobar');
        $this->assertResponseRedirects();

        $client->followRedirect();
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextSame('title', 'Foobar page');
        $this->assertSelectorTextSame('#signed', 'Yes');
    }
}
