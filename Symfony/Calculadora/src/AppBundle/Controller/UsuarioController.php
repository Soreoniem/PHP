<?php
/**
 * Creado con PhpStorm.
 * Usuario: Juan Lux
 * Fecha: 22/11/2016
 * Hora: 20:32
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Usuario;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UsuarioController extends Controller {
//╔═════  INDEX  ═════╗
	/**
	 * @Route(
	 *     path	= "/",
	 *     name	= "app_usuario_index"
	 * )
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function indexAction(){
		$manager		= $this->getDoctrine()->getManager();
		$repositorio	= $manager->getRepository("AppBundle:Usuario");
		
		return $this->render(":usuario:index.html.twig",[
			"usuarios"		=> $repositorio->findAll()
		]);
	}
	
	/**
	 * @Route(
	 *     path    = "/actualizar/{id}",
	 *     name    = "app_usuario_actualizar"
	 * )
	 * @param $id
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function actualizarAction($id){
		$manager	= $this->getDoctrine()->getManager();
		$repo		= $manager->getRepository("AppBundle:Usuario");
		
		$modUsuario	= $repo->findOneBy([
			"id"	=> $id
		]);
		
		return $this->render(":usuario:formulario.html.twig",[
			"usuario"	=> $modUsuario,
			"titulo"	=> "Actualizar",
			"action"	=> "app_usuario_doActualizar"
		]);
	}
	
	/**
	 * @Route(
	 *     path    = "/actualizando/{id}",
	 *     name    = "app_usuario_doActualizar"
	 * )
	 * @param $id
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function doActualizarAction($id, Request $request){
		$manager		= $this->getDoctrine()->getManager();
		$repositotio	= $manager->getRepository("AppBundle:Usuario");
		
		$modUsuario	= $repositotio->findOneBy([
			"id"	=> $id
		]);
		
		$modUsuario
			->setNombre($request->request->get("nombre"))
			->setEmail($request->request->get("email"))
			->setPassword($request->request->get("password"))
		;
		$manager->flush();
		return $this->redirectToRoute("app_usuario_index");
	}
	
	/**
	 * @Route(
	 *     path    = "/nuevoUsuario",
	 *     name    = "app_usuario_nuevo"
	 * )
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function nuevoAction(Request $request){
		$manager	= $this->getDoctrine()->getManager();
		
		$nuevoUsuario	= new Usuario();
		$nuevoUsuario
			->setNombre($request->request->get("nuevoNombre"))
			->setEmail($request->request->get("nuevoEmail"))
			->setPassword($request->request->get("nuevoPassword"))
		;
		
		$manager->persist($nuevoUsuario);
		$manager->flush();
		
		return $this->redirectToRoute("app_usuario_index");
	}
	
	/**
	 * @Route(
	 *     path    = "/eliminar/{id}",
	 *     name    = "app_usuario_eliminar"
	 * )
	 * @param $id
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function eliminarAction($id, Request $request){
		$manager		= $this->getDoctrine()->getManager();
		$repositotio	= $manager->getRepository("AppBundle:Usuario");
		
		$eliUsuario	= $repositotio->findOneBy([
			"id"	=> $id
		]);
		$manager->remove($eliUsuario);
		
		$manager->flush();
		return $this->redirectToRoute("app_usuario_index");
	}
}