<?php

namespace AD\PlatformBundle\Controller;

use AD\PlatformBundle\Entity\Cars;
use AD\UserBundle\Entity\User;
use AD\PlatformBundle\Form\CarsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CarsController extends Controller
{
    public function indexAction()
    {
        return $this->render('ADPlatformBundle:Cars:index.html.twig');
    }
    
    public function myCarsAction()
    {
        return $this->render('ADPlatformBundle:Cars:mycars.html.twig');
    }
    
    public function myFavsAction()
    {
        return $this->render('ADPlatformBundle:Cars:myfavs.html.twig');
    }
    
    public function newCarAction(Request $request)
    {
       $cars= new Cars();
       $cars->setUser($this->getUser());
       $form = $this->get('form.factory')->create(new \AD\PlatformBundle\Form\CarsType(), $cars);
        
        if($form->handleRequest($request)->isValid())
        {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($cars);
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('notice', 'Annonce enregistrée ! :)');
            return $this->redirect($this->generateUrl('ad_platform_mycars', array('id'=>$cars->getId())));
        }
        
       
        
        
        return $this->render('ADPlatformBundle:Cars:newcar.html.twig', array(
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
        
       
        
        
        return $this->render('ADPlatformBundle:Cars:newcar.html.twig', array(
            'form' =>$form->createView(),
        ));
    }
    public function menuAction($limit = 6)
    {
      $listCars = $this->getDoctrine()
        ->getManager()
        ->getRepository('ADPlatformBundle:Cars')
        ->findByUser(
          array($this->getUser()),                  // Recupération via le getUser
          array('id' => 'desc'),                    // On trie par date décroissante
          $limit,                                   // On sélectionne $limit annonces
          0                                         // À partir du premier
      );

      return $this->render('ADPlatformBundle:Cars:menu.html.twig', array(
        'listCars' => $listCars
      ));
    }
    
    public function menuFavAction($limit = 6)
    {
      
      return $this->render('ADPlatformBundle:Cars:menufav.html.twig');
    }
    
    public function addFavAction(Cars $car)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $user->addFavourite($car);
       //$fav->addFavorite($this->getUser());
       $em->persist($user);
       $em->flush();
       
       return $this->render('ADPlatformBundle:Cars:myfavs.html.twig');
    }
}
