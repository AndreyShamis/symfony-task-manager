<?php

namespace WerdGameBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        //$this->assertContains('Hello World', $crawler);
        $this->assertContains('Welcome', $client->getResponse()->getContent());
    }
}
