<?php

namespace AppBundle\Youtube;

use Psr\Log\LoggerInterface;

class YoutubeFetcher
{
    /**
     * @var LoggerInterface
     */
    private $logger;



    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function fetchThumbnail($videoId)
    {
        if (!empty($this->logger))
            $this->logger->info('A youtube thumbnail has been fetched');
        return sprintf("https://img.youtube.com/vi/%s/default.jpg", $videoId);
    }
}