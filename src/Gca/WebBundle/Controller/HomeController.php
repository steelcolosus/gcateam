<?php

namespace Gca\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{

    public function indexAction()
    {
			
		return $this->render('GcaWebBundle:Home:home.html.twig');
			
    }
    function loginAction() {
    	
    	return $this->render('GcaWebBundle:Home:login.html.twig');
    	
    }
    public function registerAction() {
    	
    	return $this->render('GcaWebBundle:Home:register.html.twig');
    }
}
