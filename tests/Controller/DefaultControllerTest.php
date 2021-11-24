<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString(
            "Bienvenue sur Todo List !",
            $crawler->filter('.col-md-12 h2')->text()
        );
        $crawler->filter('form')->selectButton('Se connecter');
    }
}