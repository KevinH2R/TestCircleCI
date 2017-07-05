<?php

namespace AppBundle\Controller;

use SebastianBergmann\GlobalState\RuntimeException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adminAction(Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/youtube", name="youtube")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showYoutubeThumbnailAction(Request $request)
    {
        if (!$request->query->has('videoId'))
            throw new HttpException(400);
        $videoId = $request->get('videoId');
        return $this->render('default/youtube.html.twig', array('videoId' => $videoId));
    }

    /**
     * @Route("/colorcircle", name="color-circle")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function colorCircleAction(Request $request)
    {
        return $this->render('default/colorcircle.html.twig');
    }

    /**
     * @Route("/ouiteam", name="ouiteam")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ouiteamAction(Request $request)
    {
        return $this->render('default/ouiteam.html.twig');
    }
}
