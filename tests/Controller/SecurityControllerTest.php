<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class SecurityControllerTest extends WebTestCase
{
    public function testLoginUser()
    {
        $client = static::createClient();
        $client->followRedirects();
        $crawler = $client->request('GET', '/login');
        $this->assertSame(1, $crawler->filter('input[name="_username"]')->count());
        $form = $crawler->selectButton('Se connecter')->form();
        $form['_username']->setValue('admin');
        $form['_password']->setValue('admin');
        $crawler = $client->submit($form);
    }
    
    public function testWrongLoginUser()
    {
        $client = static::createClient();
        $client->followRedirects();
        $crawler = $client->request('GET', '/login');
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('input[name="_username"]')->count());
        $form = $crawler->selectButton('Se connecter')->form();
        $form['_username']->setValue('fault_account');
        $form['_password']->setValue('fault_pwd');
        $crawler = $client->submit($form);
        $this->assertSame(1, $crawler->filter('div.alert.alert-danger')->count());
    }
    

}