<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
	/**
	 * @Route(
	 *     path	= "/",
	 *     name	= "app_default_index"
	 * )
	 * @return Response
	 */
	public function indexAction(){
		return $this->render(":default:index.html.twig");
	}
	
}
