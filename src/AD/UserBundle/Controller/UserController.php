<?php

namespace AD\UserBundle\Controller;


use AD\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AD\UserBundle\Form\UserType;



class UserController extends Controller
{
    public function indexAction() {
    return $this->redirectToRoute('us_userform_listusers');
}

    //get all users
    public function usersAction() {
        //access user manager services 

        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('ADUserBundle:Security:listusers.html.twig', array('users' =>   $users));
    }
    
    public function editUserAction($id, Request $request)
    {
        $request = $this->get('request');
        
        $em=  $this->getDoctrine()->getManager();
        $user = $em->getRepository('ADUserBundle:User')->find($id);
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);
        
        if($form->isValid())
        {
            $em->flush();
            return $this->redirectToRoute('us_userform_listusers');
            
        }
        return $this->render('ADUserBundle:Security:edituser.html.twig', array(
            'form' => $form->createView()
        ));
    }
}