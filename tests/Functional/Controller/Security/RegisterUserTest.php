<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller\Security;

use App\DataFixtures\UserFixtures;
use Liip\FunctionalTestBundle\Test\WebTestCase;

class RegisterUserTest extends WebTestCase
{
    public function setUp()
    {
        $this->loadFixtures(
            [
                UserFixtures::class
            ],
            false,
            null,
            'doctrine_mongodb'
        );
    }

    public function testItRegistersUserAndGetsValidToken(): void
    {
        $client = $this->makeClient();
        $client->request(
            'POST',
            '/register',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            '{"email": "new20@new.lt","plainPassword": "123456789"}'
        );

        $this->assertStatusCode(200, $client);
    }
}
