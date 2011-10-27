<?php

namespace Gca\WebBundle\Controller;

use Symfony\Component\Security\Core\SecurityContext;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{

    public function indexAction()
    {
			
		return $this->render('GcaWebBundle:Home:home.html.twig');
			
    }
    function loginAction() {
    	
    	return $this->render('GcaWebBundle:Home:login.html.twig', array(
					'error'=>$this->get('request')
								  ->getSession()
								  ->get(SecurityContext::AUTHENTICATION_ERROR)
				
				));
    	
    }
    public function registerAction() {
    	
    	return $this->render('GcaWebBundle:Home:register.html.twig');
    }
}
