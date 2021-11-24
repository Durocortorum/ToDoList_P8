<?php

namespace App\Tests\Controller;

use App\Tests\AbstractWebTestCase;

class TaskControllerTest extends AbstractWebTestCase
{

    public function testListPageForUser()
    {
        $client = $this->getAuthenticatedClient();

        $crawler = $client->request('GET', '/tasks');

        $this->assertEquals(3, $crawler->filter('a.btn.btn-info.pull-right[href="/tasks/create"]')->parents()->filter('.row .col-sm-4.col-lg-4.col-md-4')->count());
        $this->assertResponseIsSuccessful();
    }

    public function testListPageForAdmin()
    {
        $client = $this->getAuthenticatedAdminClient();

        $crawler = $client->request('GET', '/tasks');

        $this->assertEquals(4, $crawler->filter('a.btn.btn-info.pull-right[href="/tasks/create"]')->parents()->filter('.row .col-sm-4.col-lg-4.col-md-4')->count());
        $this->assertResponseIsSuccessful();
    }

    public function testCreateTask()
    {
        $client = $this->getAuthenticatedClient();

        $crawler = $client->request('GET', '/tasks/create');

        $form = $crawler->filter('form')->selectButton('Ajouter')->form([
            'task[title]'   => 'Nouvelle tâche',
            'task[content]' => 'Contenu'
        ]);

        $client->submit($form);
        $this->assertResponseRedirects();
        $client->followRedirect();

        $this->assertResponseIsSuccessful();
    }

    public function testEditTask()
    {
        $client = $this->getAuthenticatedClient();

        $crawler = $client->request('GET', '/tasks/1/edit');

        $form = $crawler->filter('form')->selectButton('Modifier')->form([
            'task[title]'   => 'Titre modifié',
            'task[content]' => 'Contenu modifié'
        ]);

        $client->submit($form);
        $this->assertResponseRedirects();
        $client->followRedirect();

        $this->assertResponseIsSuccessful();
    }

    public function testToggleTask()
    {
        $client = $this->getAuthenticatedClient();

        $client->request('GET', '/tasks/1/toggle');

        $this->assertResponseRedirects();
        $client->followRedirect();

        $this->assertResponseIsSuccessful();
    }
    
    public function testDeleteTask()
    {
        $client = $this->getAuthenticatedClient();

        $client->request('GET', '/tasks/1/delete');

        $this->assertResponseRedirects();
        $client->followRedirect();

        $this->assertResponseIsSuccessful();
    }
    
}