<?php

declare(strict_types=1);

namespace Ajgarlag\Bundle\FoobarBundle\Tests\Acceptance;

use Ajgarlag\Bundle\FoobarBundle\Manager\RelyingPartyManagerInterface;
use Ajgarlag\Bundle\FoobarBundle\Tests\Fixtures\FixtureFactory;
use Ajgarlag\Bundle\FoobarBundle\Tests\WebTestCaseTrait;
use League\Bundle\OAuth2ServerBundle\Manager\AccessTokenManagerInterface;
use League\Bundle\OAuth2ServerBundle\Manager\AuthorizationCodeManagerInterface;
use League\Bundle\OAuth2ServerBundle\Manager\ClientManagerInterface;
use League\Bundle\OAuth2ServerBundle\Manager\RefreshTokenManagerInterface;
use League\Bundle\OAuth2ServerBundle\Manager\ScopeManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Security\Core\User\UserInterface;

abstract class AbstractAcceptanceTestCase extends WebTestCase
{
    use WebTestCaseTrait;

    protected function getUser(string $userIdentifier = 'user'): UserInterface
    {
        $userProvider = static::getContainer()->get('security.user_providers');

        return $userProvider->loadUserByIdentifier($userIdentifier);
    }
}
