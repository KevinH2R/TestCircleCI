<?php

namespace AppBundle\JobOffer;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 01/06/2017
 * Time: 11:38
 */
class JobOfferHeaderListener
{
    /**
     * kernel.response
     * @param FilterResponseEvent $event
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $response = $event->getResponse();
        $response->headers->add(['X-job' => 'I need you']);
    }

}