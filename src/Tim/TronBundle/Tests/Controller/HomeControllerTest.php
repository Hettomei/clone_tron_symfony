<?php

namespace Tim\TronBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/home');

        $this->assertTrue($crawler->filter('html:contains("Hello")')->count() > 0);
    }
}
