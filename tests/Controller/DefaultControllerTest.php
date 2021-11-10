<?php

namespace App\Tests\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

    public function testHomepageIsUp()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
    }

    public function testH1HelloPage()
    {
        $client = static::createClient();
        $client->request('GET', '/' );
        $this->assertSelectorTextContains('h1', 'Bienvenu sur mon site');
        $this->assertSelectorTextContains('h2', 'Bienvenu');
    }

}