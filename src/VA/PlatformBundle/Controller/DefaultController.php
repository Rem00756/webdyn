<?php

namespace VA\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $voiture = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('ADPlatformBundle:Cars')
                            ->findAll();
                    
        return $this->render('VAPlatformBundle:Default:index.html.twig',['voiture' => $voiture]);
    }

    public function researchAction(Request $request)
    {
        $motcle = $request->query->get('formHome');
        
        if ($motcle == null)
        {   
            $listCars = $this   ->getDoctrine()
                                ->getManager()
                                ->getRepository('ADPlatformBundle:Cars')
                                ->findBy(array(), array('id' => 'DESC'));
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                    $listCars,
                    $request->query->getInt('page', 1),
                    6
                    );
  
            return $this->render('VAPlatformBundle:Default:research.html.twig', ['listCars'=> $listCars, 'pagination' => $pagination]);
        }
        else
        {
            $listCars = $this   ->getDoctrine()
                                ->getManager()
                                ->getRepository('ADPlatformBundle:Cars')
                                ->findByMotCle($motcle);
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                    $listCars,
                    $request->query->getInt('page', 1),
                    9
                    );
  

            return $this->render('VAPlatformBundle:Default:research.html.twig', ['listCars' => $listCars, 'pagination' => $pagination]); 
        }
        
    }
    
    public function carAction($slugurl)
    {
        $voiture = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('ADPlatformBundle:Cars')
                            ->findOneBySlugurl($slugurl);
                    
        return $this->render('VAPlatformBundle:Default:car.html.twig',['voiture' => $voiture]);
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
    
    public function waitAction()
    {
        return $this->render('VAPlatformBundle:Default:wait.html.twig');
    }
    
    public function blogAction(Request $request)
    {  
            $listCars = $this   ->getDoctrine()
                                ->getManager()
                                ->getRepository('ADPlatformBundle:Article')
                                ->findBy(array(), array('id' => 'DESC'));
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                    $listCars,
                    $request->query->getInt('page', 1),
                    1
                    );
  
            return $this->render('VAPlatformBundle:Default:blog.html.twig', ['listCars'=> $listCars, 'pagination' => $pagination]);
    }
}
