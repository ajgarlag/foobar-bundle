<?php

declare(strict_types=1);

namespace Ajgarlag\Bundle\FoobarBundle\Tests\Functional\Controller;

use Ajgarlag\Bundle\FoobarBundle\Tests\WebTestCaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class FoobarControllerTest extends WebTestCase
{
    use WebTestCaseTrait;

    public function testFoobarResponse(): void
    {
        $client = self::createClient();
        $client->request('GET', '/foobar');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextSame('title', 'Foobar page');
    }
}
