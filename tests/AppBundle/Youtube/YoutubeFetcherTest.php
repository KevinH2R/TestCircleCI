<?php

namespace Tests\AppBundle\Youtube;

use AppBundle\Youtube\YoutubeFetcher;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class YoutubeFetcherTest extends WebTestCase
{
    public function testFetchThumbnail()
    {
        $youtubeFetcher = new YoutubeFetcher();
        $videoId = 'someId';
        $found = $youtubeFetcher->fetchThumbnail($videoId);
        $expected = 'https://img.youtube.com/vi/'.$videoId.'/default.jpg';
        $this->assertRegExp('/^https/', $found);
        $this->assertContains($videoId, $found);
        $this->assertSame($expected, $found);
    }

    public function testFetchThumbnailWithLogging()
    {
        $logger = $this->createMock(LoggerInterface::class);

        $youtubeFetcher = new YoutubeFetcher();
        $youtubeFetcher->setLogger($logger);

        $logger->expects($this->once())
            ->method('info');

        $videoId = 'someId';
        $found = $youtubeFetcher->fetchThumbnail($videoId);
        $expected = 'https://img.youtube.com/vi/'.$videoId.'/default.jpg';
        $this->assertRegExp('/^https/', $found);
        $this->assertContains($videoId, $found);
        $this->assertSame($expected, $found);
    }

    public function testShowYoutube()
    {
        $videoId = 'someId';
        $client = static::createClient();
        $client->enableProfiler();
        $crawler = $client->request('GET', '/youtube?videoId='.$videoId);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $logsCollector = $client->getProfile()->getCollector('logger');
        $logs = $logsCollector->getLogs();
        $count = 0;
        foreach ($logs as $log) {
            if ($log['message'] == 'A youtube thumbnail has been fetched')
                ++$count;
        }
        $this->assertEquals(1, $count);
    }
}