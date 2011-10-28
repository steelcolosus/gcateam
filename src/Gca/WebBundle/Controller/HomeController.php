<?php

namespace Gca\WebBundle\Controller;

use Symfony\Component\Security\Core\SecurityContext;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{

	public function indexAction(){
		return $this->render('GcaWebBundle:Home:home.html.twig');
	}

	function loginAction() {
		if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
			$error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
		}else{
			$error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
		}
			
		return $this->render('GcaWebBundle:Home:login.html.twig', array(
				'error'=>$error,

		));
	}

	public function registerAction() {
		return $this->render('GcaWebBundle:Home:register.html.twig');
	}
	
	function despedidaAction() {
		return $this->render('GcaWebBundle:Home:logout.html.twig');
	}
}
