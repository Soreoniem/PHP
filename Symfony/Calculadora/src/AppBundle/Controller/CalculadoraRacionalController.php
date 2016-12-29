<?php

namespace AppBundle\Controller;

use AppBundle\Service\CalculadoraService;
use AppBundle\Service\RacionalService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CalculadoraRacionalController extends Controller{
//╔═════  ATRIBUTOS  ═════╗
	/**
	 * @var CalculadoraService
	 */
	protected $calculadora;
	
//╔═════  CONSTRUCTOR  ═════╗
	public function __construct(){
		$this->calculadora	= new CalculadoraService();
	}
	
//╔═════  INDEX  ═════╗
	/**
	 * @Route(
	 *     path	= "/",
	 *     name	= "app_calculadoraRacional_index"
	 * )
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
    public function indexAction(){
		return $this->render(":calculadoraRacional:index.html.twig");
    }
    
//╔═════  SUMAR  ═════╗
	/**
	 * @Route(
	 *     path	= "/sumar",
	 *     name	= "app_calculadoraRacional_sumar"
	 * )
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function sumarAction(){
		return $this->render(":calculadoraRacional:formulario.html.twig",[
			"action"	=> "app_calculadoraRacional_doSumar",
			"titulo"	=> "Sumar",
			"operando"	=> "➗",
			"operandoRacional"	=> "➕"
		]);
	}
	
	/**
	 * @Route(
	 *     path	= "/doSumar",
	 *     name	= "app_calculadoraRacional_doSumar"
	 * )
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function doSumarAction(Request $request){
	 // Datos
		$operador1_Numerador	= $request->request->get("operador1_Numerador");
		$operador1_Denominador	= $request->request->get("operador1_Denominador");
		$operador2_Numerador	= $request->request->get("operador2_Numerador");
		$operador2_Denominador	= $request->request->get("operador2_Denominador");
	
	 // Operaciones
		$this->calculadora
			->setOperador1(new RacionalService($operador1_Numerador, $operador1_Denominador))
			->setOperador2(new RacionalService($operador2_Numerador, $operador2_Denominador))
			->sumar();
		$resultado	= $this->calculadora->getResultado();
		
	 // Vista
		return $this->render(":calculadoraRacional:resultado.html.twig",[
			"titulo"				=> "Sumar",
			"rutaOperacionActual"	=> "app_calculadoraRacional_sumar",
			"operador1_Numerador"	=> $operador1_Numerador,
			"operador1_Denominador"	=> $operador1_Denominador,
			"operador2_Numerador"	=> $operador2_Numerador,
			"operador2_Denominador"	=> $operador2_Denominador,
			"operando"				=> "➖",
			"operandoRacional"		=> "➕",
			"resultado_Numerador"	=> $resultado->getNumerador(),
			"resultado_Denominador"	=> $resultado->getDenominador()
		]);
	}
    
//╔═════  RESTAR  ═════╗
	/**
	 * @Route(
	 *     path	= "/restar",
	 *     name	= "app_calculadoraRacional_restar"
	 * )
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function restarAction(){
		return $this->render(":calculadoraRacional:formulario.html.twig",[
			"action"	=> "app_calculadoraRacional_doRestar",
			"titulo"	=> "Restar",
			"operando"	=> "➗",
			"operandoRacional"	=> "➖"
		]);
	}
	
	/**
	 * @Route(
	 *     path	= "/doRestar",
	 *     name	= "app_calculadoraRacional_doRestar"
	 * )
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function doRestarAction(Request $request){
	 // Datos
		$operador1_Numerador	= $request->request->get("operador1_Numerador");
		$operador1_Denominador	= $request->request->get("operador1_Denominador");
		$operador2_Numerador	= $request->request->get("operador2_Numerador");
		$operador2_Denominador	= $request->request->get("operador2_Denominador");
	
	 // Operaciones
		$this->calculadora
			->setOperador1(new RacionalService($operador1_Numerador, $operador1_Denominador))
			->setOperador2(new RacionalService($operador2_Numerador, $operador2_Denominador))
			->restar();
		$resultado	= $this->calculadora->getResultado();
		
	 // Vista
		return $this->render(":calculadoraRacional:resultado.html.twig",[
			"titulo"				=> "Restar",
			"rutaOperacionActual"	=> "app_calculadoraRacional_restar",
			"operador1_Numerador"	=> $operador1_Numerador,
			"operador1_Denominador"	=> $operador1_Denominador,
			"operador2_Numerador"	=> $operador2_Numerador,
			"operador2_Denominador"	=> $operador2_Denominador,
			"operando"				=> "➖",
			"operandoRacional"		=> "➖",
			"resultado_Numerador"	=> $resultado->getNumerador(),
			"resultado_Denominador"	=> $resultado->getDenominador()
		]);
	}

//╔═════  MULTIPLICAR  ═════╗
	/**
	 * @Route(
	 *     path	= "/multiplicar",
	 *     name	= "app_calculadoraRacional_multiplicar"
	 * )
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function multiplicarAction(){
		return $this->render(":calculadoraRacional:formulario.html.twig",[
			"action"	=> "app_calculadoraRacional_doMultiplicar",
			"titulo"	=> "Multiplicar",
			"operando"	=> "➗",
			"operandoRacional"	=> "✖"
		]);
	}
	
	/**
	 * @Route(
	 *     path	= "/doMultiplicar",
	 *     name	= "app_calculadoraRacional_doMultiplicar"
	 * )
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function doMultiplicarAction(Request $request){
		// Datos
		$operador1_Numerador	= $request->request->get("operador1_Numerador");
		$operador1_Denominador	= $request->request->get("operador1_Denominador");
		$operador2_Numerador	= $request->request->get("operador2_Numerador");
		$operador2_Denominador	= $request->request->get("operador2_Denominador");
		
		// Operaciones
		$this->calculadora
			->setOperador1(new RacionalService($operador1_Numerador, $operador1_Denominador))
			->setOperador2(new RacionalService($operador2_Numerador, $operador2_Denominador))
			->multiplicar();
		$resultado	= $this->calculadora->getResultado();
		
		// Vista
		return $this->render(":calculadoraRacional:resultado.html.twig",[
			"titulo"				=> "Multiplicar",
			"rutaOperacionActual"	=> "app_calculadoraRacional_multiplicar",
			"operador1_Numerador"	=> $operador1_Numerador,
			"operador1_Denominador"	=> $operador1_Denominador,
			"operador2_Numerador"	=> $operador2_Numerador,
			"operador2_Denominador"	=> $operador2_Denominador,
			"operando"				=> "➖",
			"operandoRacional"		=> "✖",
			"resultado_Numerador"	=> $resultado->getNumerador(),
			"resultado_Denominador"	=> $resultado->getDenominador()
		]);
	}

//╔═════  DIVIDIR  ═════╗
	/**
	 * @Route(
	 *     path	= "/dividir",
	 *     name	= "app_calculadoraRacional_dividir"
	 * )
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function dividirAction(){
		return $this->render(":calculadoraRacional:formulario.html.twig",[
			"action"	=> "app_calculadoraRacional_doDividir",
			"titulo"	=> "Dividir",
			"operando"	=> "➗",
			"operandoRacional"	=> "➗"
		]);
	}
	
	/**
	 * @Route(
	 *     path	= "/doDividir",
	 *     name	= "app_calculadoraRacional_doDividir"
	 * )
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function doDividirAction(Request $request){
		// Datos
		$operador1_Numerador	= $request->request->get("operador1_Numerador");
		$operador1_Denominador	= $request->request->get("operador1_Denominador");
		$operador2_Numerador	= $request->request->get("operador2_Numerador");
		$operador2_Denominador	= $request->request->get("operador2_Denominador");
		
		// Operaciones
		$this->calculadora
			->setOperador1(new RacionalService($operador1_Numerador, $operador1_Denominador))
			->setOperador2(new RacionalService($operador2_Numerador, $operador2_Denominador))
			->dividir_Racional();
		$resultado	= $this->calculadora->getResultado();
		
		// Vista
		return $this->render(":calculadoraRacional:resultado.html.twig",[
			"titulo"				=> "Dividir",
			"rutaOperacionActual"	=> "app_calculadoraRacional_dividir",
			"operador1_Numerador"	=> $operador1_Numerador,
			"operador1_Denominador"	=> $operador1_Denominador,
			"operador2_Numerador"	=> $operador2_Numerador,
			"operador2_Denominador"	=> $operador2_Denominador,
			"operando"				=> "➖",
			"operandoRacional"		=> "➗",
			"resultado_Numerador"	=> $resultado->getNumerador(),
			"resultado_Denominador"	=> $resultado->getDenominador()
		]);
	}
}
