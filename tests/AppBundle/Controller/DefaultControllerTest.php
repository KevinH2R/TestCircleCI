<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }

    public function testShowYoutubeThumbnail()
    {
        $client = static::createClient();

        $videoId = 'coucou';
        $crawler = $client->request('GET', '/youtube?videoId='.$videoId);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $source = $crawler->filter('#container img')->attr('src');
        $this->assertRegExp('/^https/', $source);
        $this->assertContains($videoId, $source);
    }
}
