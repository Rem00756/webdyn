<?php

namespace AD\PlatformBundle\Controller;

use AD\PlatformBundle\Entity\Cars;
use AD\PlatformBundle\Form\CarsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


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
    
    public function newCarAction(Request $request)
    {
       $cars= new Cars();
       $form = $this->get('form.factory')->create(new \AD\PlatformBundle\Form\CarsType(), $cars);
        
        if($form->handleRequest($request)->isValid())
        {
            //$cars->getImage()->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($cars);
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('notice', 'Annonce enregistrée ! :)');
            return $this->redirect($this->generateUrl('ad_platform_mycars', array('id'=>$cars->getId())));
        }
        
       
        
        
        return $this->render('ADPlatformBundle:Default:newcar.html.twig', array(
            'form' =>$form->createView(),
        ));
    }
    public function editCarAction(Request $request)
    {
        $cars = $this->getDoctrine()
            ->getManager()
            ->getRepository('ADPlatformBundle:Cars')
            ->find($id)
          ;

          // Et on construit le formBuilder avec cette instance de l'annonce, comme précédemment
          $formBuilder = $this->get('form.factory')->createBuilder('form', $advert);
                
                
        $form->handleRequest($request);
        
        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cars);
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('notice', 'Annonce enregistrée ! :)');
            return $this->redirect($this->generateUrl('ad_platform_mycars', array('id'=>$cars->getId())));
        }
        
       
        
        
        return $this->render('ADPlatformBundle:Default:newcar.html.twig', array(
            'form' =>$form->createView(),
        ));
    }
}
