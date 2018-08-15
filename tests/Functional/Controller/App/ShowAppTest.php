<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller\App;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class ShowAppTest extends WebTestCase
{
    public function testItShowsApp(): void
    {
        $client = $this->makeClient();
        $client->request('GET', '/');

        $this->assertStatusCode(200, $client);
    }

    public function testItHasAppHtmlInstance(): void
    {
        $content = $this->fetchContent('/');
        $this->assertContains(
            '<app></app>',
            $content
        );
    }
}
