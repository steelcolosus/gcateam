<?php	
namespace Gca\WebBundle\Form;

use Gca\WebBundle\GcaWebBundle;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;


	
/**
 *
 *
 * @author wayo
 */
class UsuarioType extends AbstractType  {


	public function buildForm(FormBuilder $builder, array $options)
	    {
	        $builder->add('nombre');
	        $builder->add('apellido');
	        $builder->add('telefono');
	        $builder->add('email','email');
	        $builder->add('password','repeated',array('type'=>'password'));
	    }
	
	    public function getDefaultOptions(array $options)
	    {
	        return array(
	            'data_class' => 'Gca\WebBundle\Entity\Usuario',
	        );
	    }
	
	    public function getName()
	    {
	        return 'user';
	    }
	
	
}