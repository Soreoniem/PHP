<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller{
	
	/**
	 * @Route(
	 *     path	= "/",
	 *     name	= "app_default_index"
	 * )
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function indexAction(){
		return $this->render(":default:index.html.twig");
	}
}
