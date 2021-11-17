<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{

    public function testHomepageIsUp()
    {
        $client = static::createClient();
        $client->request('GET', '/login');

        $this->assertResponseIsSuccessful();
    }

    // public function testH1HelloPage()
    // {
    //     // $client = static::createClient();
    //     // $client->request('GET', '/' );
    //     // $this->assertSelectorTextContains('h1', 'Bienvenue sur Todo List');
    // }

}