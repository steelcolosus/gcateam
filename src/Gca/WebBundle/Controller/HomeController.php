<?php

namespace Gca\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{

    public function indexAction()
    {
			
		return $this->render('GcaWebBundle:Home:index.html.twig');
			
    }
}
