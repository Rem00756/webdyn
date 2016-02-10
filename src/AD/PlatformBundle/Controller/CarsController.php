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
    
    public function myReportListAction()
    {
        return $this->render('ADPlatformBundle:Cars:listcar.html.twig');
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
    
    public function editCarAction($id, Request $request)
    {
            $user = $this->container->get('security.context')->getToken()->getUser();
            $user->getId();
            
            
            $voiture = $this->getDoctrine()->getManager()->getRepository('ADPlatformBundle:Cars')
                    ->find($id);
           
            
            if($voiture->getUser() == $user){

                $request = $this->get('request');

                $em = $this->getDoctrine()->getEntityManager();
                $car = $em->getRepository('ADPlatformBundle:Cars')->find($id);
                $form = $this->createForm(new CarsType(), $car);
                $form->handleRequest($request);


                if($form->isValid())
                {
                    $em->flush();

                    return $this->render('ADPlatformBundle:Cars:mycars.html.twig');
                }

                return $this->render('ADPlatformBundle:Cars:editcars.html.twig', array (
                    'form'=> $form->createView()
                ));
            }
            else {
                return $this->render('ADPlatformBundle:Cars:index.html.twig');
            }
    }
    
    public function editCarAdminAction($id, Request $request)
    {
        
        $user = $this->container->get('security.context')->getToken()->getUser();
        $user->getId();


        $voiture = $this->getDoctrine()->getManager()->getRepository('ADPlatformBundle:Cars')
                ->find($id);
        
        if($voiture->getUser() == $user){
        $request = $this->get('request');
        
        $em = $this->getDoctrine()->getEntityManager();
        $car = $em->getRepository('ADPlatformBundle:Cars')->find($id);
        $form = $this->createForm(new CarsType(), $car);
        $form->handleRequest($request);
       
       
        if($form->isValid())
        {
            $em->flush();
        
            return $this->render('ADPlatformBundle:Cars:mycars.html.twig');
        }
        
        return $this->render('ADPlatformBundle:Cars:editcarsadmin.html.twig', array (
            'form'=> $form->createView()
        ));
        }
        else {
                return $this->render('ADPlatformBundle:Cars:index.html.twig');
            }
       
    }
    
    public function deleteCarAction($id, Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $user->getId();


        $voiture = $this->getDoctrine()->getManager()->getRepository('ADPlatformBundle:Cars')
                ->find($id);
        
        if($voiture->getUser() == $user){
        $em = $this->getDoctrine()->getManager();
        
        $cars = $this->getDoctrine()
            ->getManager()
            ->getRepository('ADPlatformBundle:Cars')
            ->find($id)
        ;
        
      
        $em->remove($cars);
        $em->flush();
        
        return $this->render('ADPlatformBundle:Cars:index.html.twig');
        }
        else {
                return $this->render('ADPlatformBundle:Cars:index.html.twig');
            }
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
    
    public function reportlistAction()
    {
        $listCars = $this->getDoctrine()
        ->getManager()
        ->getRepository('ADPlatformBundle:Cars')
        ->findByReport();
                                              
     

      return $this->render('ADPlatformBundle:Cars:menureport.html.twig', array(
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
        /**
         * @var \AD\UserBundle\Entity\User
         */
        $user = $this->getUser();
        
        // La méthode contains appartiens à getFavourites qui retourne TRUE/FALSE
        if ($user->getFavourites()->contains($car))
        { 
            return $this->render('ADPlatformBundle:Cars:myfavs.html.twig');
        }
        else
        {
            $user->addFavourite($car);
            $em->persist($user);
            $em->flush();
            return $this->render('ADPlatformBundle:Cars:myfavs.html.twig');
        }
    }
    
    public function reportAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $voiture = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('ADPlatformBundle:Cars')
                        ->find($id);
        
        $voiture->setReport('1');
        
        $em->persist($voiture);
        $em->flush();
        
        
        return $this->render('VAPlatformBundle:Default:index.html.twig');
                
    }
    
    public function notificationAction()
    {
        $listCars = $this->getDoctrine()
        ->getManager()
        ->getRepository('ADPlatformBundle:Cars')
        ->findByReport();
                                              
     

      return $this->render('::layout.html.twig', array(
        'listCars' => $listCars
      ));
    }
}
