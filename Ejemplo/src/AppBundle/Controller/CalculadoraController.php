<?php

namespace AppBundle\Controller;

use AppBundle\Service\CalculadoraService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalculadoraController extends Controller
{
	/**
	 * @Route(
	 *     path = "/",
	 *     name = "app_calculadora_index"
	 * )
	 * @return Response
	 */
	public function indexAction(){
		return $this->render(":calculadora:index.html.twig");
	}
	
	/**
	 * @Route(
	 *     path = "/sumar",
	 *     name = "app_calculadora_sumar"
	 * )
	 * @return Response
	 */
	public function sumarAction(){
		return $this->render(":calculadora:form.html.twig",[
			"action"	=> "app_calculadora_doSumar",
			"titulo"	=> "Sumar",
			"operando"	=> "➕"
		]);
	}
	
	/**
	 * @Route(
	 *     path    = "/doSumar",
	 *     name    = "app_calculadora_doSumar"
	 * )
	 * @param Request $request
	 * @return Response
	 */
	public function doSumarAction(Request $request){
		$op1	= $request->request->get("op1");
		$op2	= $request->request->get("op2");
		
		$calculadora	= new CalculadoraService($op1, $op2);
		
		$calculadora->sumar();
		$resultado	= $calculadora->getResultado();
		
		return $this->render(":calculadora:resultado.html.twig", [
			"frase"		=> "suma",
			"op1"		=> $op1,
			"operador"	=> "➕",
			"op2"		=> $op2,
			"resultado"	=> $resultado
		]);
	}
	
	/**
	 * @Route(
	 *     path = "/restar",
	 *     name = "app_calculadora_restar"
	 * )
	 * @return Response
	 */
	public function restarAction(){
		return $this->render(":calculadora:form.html.twig",[
			"action"	=> "app_calculadora_doRestar",
			"titulo"	=> "Restar",
			"operando"	=> "➖"
		]);
	}
	
	/**
	 * @Route(
	 *     path    = "/doRestar",
	 *     name    = "app_calculadora_doRestar"
	 * )
	 * @param Request $request
	 * @return Response
	 */
	public function doRestarAction(Request $request){
		$op1	= $request->request->get("op1");
		$op2	= $request->request->get("op2");
		
		$calculadora	= new CalculadoraService($op1, $op2);
		
		$calculadora->restar();
		$resultado	= $calculadora->getResultado();
		
		return $this->render(":calculadora:resultado.html.twig", [
			"frase"		=> "resta",
			"op1"		=> $op1,
			"operador"	=> "➖",
			"op2"		=> $op2,
			"resultado"	=> $resultado
		]);
	}
	
	/**
	 * @Route(
	 *     path = "/multiplicar",
	 *     name = "app_calculadora_multiplicar"
	 * )
	 * @return Response
	 */
	public function multiplicarAction(){
		return $this->render(":calculadora:form.html.twig",[
			"action"	=> "app_calculadora_doMultiplicar",
			"titulo"	=> "Multiplicar",
			"operando"	=> "✖"
		]);
	}
	
	/**
	 * @Route(
	 *     path    = "/doMultiplicar",
	 *     name    = "app_calculadora_doMultiplicar"
	 * )
	 * @param Request $request
	 * @return Response
	 */
	public function doMultiplicarAction(Request $request){
		$op1	= $request->request->get("op1");
		$op2	= $request->request->get("op2");
		
		$calculadora	= new CalculadoraService($op1, $op2);
		
		$calculadora->multiplicar();
		$resultado	= $calculadora->getResultado();
		
		return $this->render(":calculadora:resultado.html.twig", [
			"frase"		=> "multiplicación",
			"op1"		=> $op1,
			"operador"	=> "✖",
			"op2"		=> $op2,
			"resultado"	=> $resultado
		]);
	}
	
	/**
	 * @Route(
	 *     path = "/dividir",
	 *     name = "app_calculadora_dividir"
	 * )
	 * @return Response
	 */
	public function dividirAction(){
		return $this->render(":calculadora:form.html.twig",[
			"action"	=> "app_calculadora_doDividir",
			"titulo"	=> "Dividir",
			"operando"	=> "➗"
		]);
	}
	
	/**
	 * @Route(
	 *     path    = "/doDividir",
	 *     name    = "app_calculadora_doDividir"
	 * )
	 * @param Request $request
	 * @return Response
	 */
	public function doDividirAction(Request $request){
		$op1	= $request->request->get("op1");
		$op2	= $request->request->get("op2");
		
		$calculadora	= new CalculadoraService($op1, $op2);
		
		$calculadora->dividir();
		$resultado	= $calculadora->getResultado();
		
		return $this->render(":calculadora:resultado.html.twig", [
			"frase"		=> "división",
			"op1"		=> $op1,
			"operador"	=> "➗",
			"op2"		=> $op2,
			"resultado"	=> $resultado
		]);
	}
}
