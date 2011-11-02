<?php

namespace Gca\WebBundle\Controller;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use Gca\WebBundle\Entity\Usuario;

use Gca\WebBundle\GcaWebBundle;

use Symfony\Component\HttpFoundation\Request;

use Gca\WebBundle\Form\UsuarioType;

use Symfony\Component\Security\Core\User\User;

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

	public function registerAction(Request $request) {
		
		
		$usuario = new Usuario();
		$form = $this->createForm(new UsuarioType(),$usuario);
		
 		if ($request->getMethod()=='POST') {
 			$form->bindRequest($request);
 			if ($form->isValid()){
 				//Seteamos el mensaje de registro satisfactorio
 				$session = $request->getSession();
 				$session->setFlash('mensaje','Gracias por registrar sus datos');
				
 				//obtenemos los datos
 				$usuario = $form->getData();
				
 				//Codificamos la contraseña
 				$factory = $this->get('security.encoder_factory');
 				$codificador = $factory->getEncoder($usuario);
 				$password = $codificador->encodePassword($usuario->getPassword(), $usuario->getSalt());
 				$usuario->setPassword($password);
				
 				//Guardamos el usuario en la base de datos
 				$em = $this->getDoctrine()->getEntityManager();
 				$em->persist($usuario);
 				$em->flush();
				
      			//logueamos al usuario
     			
 				$token = new UsernamePasswordToken($usuario, null, 'main', $usuario->getRoles());
 				$this->get('security.context')->setToken($token);
								
				
 				return $this->render('GcaWebBundle:Home:bienvenido.html.twig',
 						array(
 								'name'=>$usuario->getNombre()." ".$usuario->getApellido()													
 							)
 						);
				
 			};
 		}
		
		return $this->render('GcaWebBundle:Home:register.html.twig',array('form' => $form->createView()));
	}
	
	function despedidaAction() {
		return $this->render('GcaWebBundle:Home:logout.html.twig');
	}
}
