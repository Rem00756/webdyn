<?php

namespace AD\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ADPlatformBundle:Default:index.html.twig');
    }
    
    public function myCarsAction()
    {
        return $this->render('ADPlatformBundle:Default:mycars.html.twig');
    }
    
    public function myFavsAction()
    {
        return $this->render('ADPlatformBundle:Default:myfavs.html.twig');
    }
    
    public function newCarAction()
    {
        return $this->render('ADPlatformBundle:Default:newcar.html.twig');
    }
}
