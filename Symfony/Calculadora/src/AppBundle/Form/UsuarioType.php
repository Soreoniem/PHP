<?php

namespace AppBundle\Form;

use AppBundle\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuarioType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options){
		$builder
			->add("nombre", TextType::class)
			->add("email", EmailType::class)
			->add("password", PasswordType::class)
		;
	}

	public function configureOptions(OptionsResolver $resolver){
		$resolver->setDefaults([
			"data_class"	=> Usuario::class
		]);
	}
	
	public function getName(){
		return 'app_bundle_usuario_type';
	}
}
