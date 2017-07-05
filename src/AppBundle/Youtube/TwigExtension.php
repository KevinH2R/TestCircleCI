<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 31/05/2017
 * Time: 14:17
 */
 namespace AppBundle\Youtube;

 use Twig_Environment;

 class TwigExtension extends \Twig_Extension
 {
    private $youtubeFetcher;

     /**
      * @param $youtubeFetcher
      */
     public function __construct($youtubeFetcher)
     {
         $this->youtubeFetcher = $youtubeFetcher;
     }


     public function getName()
    {
        return 'youtube';
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('get_youtube_thumbnail', [$this, 'getYoutubeThumbnail'])
        ];
    }

    public function getYoutubeThumbnail($videoId)
    {
        return $this->youtubeFetcher->fetchThumbnail($videoId);
    }

     public function initRuntime(Twig_Environment $environment)
     {
         // TODO: Implement initRuntime() method.
     }

     public function getGlobals()
     {
         // TODO: Implement getGlobals() method.
     }
 }