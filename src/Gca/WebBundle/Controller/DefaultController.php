<?php

namespace Gca\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    
    public function indexAction($name,$apellido)
    {
			

			$options = array('name'=>$name,'apellido'=>$apellido);
			

			if($name=='eduardo')			
				$this->get('session')->setFlash('notice','usuario identificado');
			else 
				$this->get('session')->setFlash('notice','usuario incorrecto');
			

			return $this->render('GcaWebBundle:Default:index.html.twig',$options);
    }
}
