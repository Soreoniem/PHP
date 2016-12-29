<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Producto;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductoController extends Controller{
	/**
	 * @Route(
	 *     path	= "/",
	 *     name	= "app_producto_index"
	 * )
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
    public function indexAction(){
    	 // Variables
		$manager	= $this->getDoctrine()->getManager();
		$repositorio	= $manager->getRepository("AppBundle:Producto");
    	$productos	= $repositorio->findOneBy([
    		"nombre"	=> "Meizu MX5"
		]);
		
		$manager->remove($productos);
		
		$manager->flush();
		$productos	= $repositorio->findAll();
		
		 // Vista
        return $this->render(':producto:index.html.twig', [
        	"productos"	=> $productos
		]);
		// return $this->redirecttoroute("app_etc.")
		// path = "/update/{id}"
    }
}
