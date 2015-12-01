<?php

namespace VA\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VAPlatformBundle:Default:index.html.twig');
    }

    public function researchAction()
    {
        return $this->render('VAPlatformBundle:Default:research.html.twig');
    }
    
    public function carAction()
    {
        return $this->render('VAPlatformBundle:Default:car.html.twig');
    }
    
    public function faqAction()
    {
        return $this->render('VAPlatformBundle:Default:faq.html.twig');
    }
    
    public function loginAction()
    {
        return $this->render('VAPlatformBundle:Default:login.html.twig');
    }
    
    public function registerAction()
    {
        return $this->render('VAPlatformBundle:Default:register.html.twig');
    }
}
