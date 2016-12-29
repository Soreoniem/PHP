<?php
/**
 * Creado con PhpStorm.
 * Usuario: Juan Lux
 * Fecha: 18/11/2016
 * Hora: 17:43
 */

namespace AppBundle\Controller;


use AppBundle\Service\CalculadoraService;
use AppBundle\Service\RacionalService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CalculadoraController extends Controller {
//╔═════  ATRIBUTOS  ═════╗
	/**
	 * @var CalculadoraService
	 */
	protected $calculadora;
	
//╔═════  CONSTRUCTOR  ═════╗
	/**
	 * CalculadoraController constructor.
	 */
	public function __construct(){
		$this->calculadora	= new CalculadoraService();
	}
	
//╔═════  INDEX  ═════╗
	/**
	 * @Route(
	 *     path	= "/",
	 *     name	= "app_calculadora_index"
	 * )
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function indexAction(){
	 // Resultado
		return $this->render(":calculadora:index.html.twig");
	}
	
//╔═════  SUMAR  ═════╗
	/**
	 * @Route(
	 *     path	= "/sumar",
	 *     name	= "app_calculadora_sumar"
	 * )
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function sumarAction(){
	 // Resultado
		return $this->render(":calculadora:formulario.html.twig",[
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
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function doSumarAction(Request $request){
	 // Datos
		$operador1		= $request->request->get("operador1");
		$operador2		= $request->request->get("operador2");
		
	 // Operaciones
		$this->calculadora
			->setOperador1(new RacionalService($operador1))
			->setOperador2(new RacionalService($operador2))
			->sumar();
		
		
	 // Resultado
		$resultado	= $this->calculadora->getResultado()->getNumerador();
		
	 // Vista
		return $this->render(":calculadora:resultado.html.twig",[
			"titulo"				=> "Sumar",
			"rutaOperacionActual"	=> "app_calculadora_sumar",
			"operador1"				=> $operador1,
			"operador2"				=> $operador2,
			"operando"				=> "➕",
			"resultado"				=> $resultado
		]);
	}
	
//╔═════  RESTAR  ═════╗
	/**
	 * @Route(
	 *     path	= "/restar",
	 *     name	= "app_calculadora_restar"
	 * )
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function restarAction(){
	 // Resultado
		return $this->render(":calculadora:formulario.html.twig",[
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
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function doRestarAction(Request $request){
	 // Datos
		$operador1		= $request->request->get("operador1");
		$operador2		= $request->request->get("operador2");
		
	 // Operaciones
		$this->calculadora
			->setOperador1(new RacionalService($operador1))
			->setOperador2(new RacionalService($operador2))
			->restar();
		
	 // Resultado
		$resultado	= $this->calculadora->getResultado()->getNumerador();
		
		return $this->render(":calculadora:resultado.html.twig",[
			"titulo"				=> "Restar",
			"rutaOperacionActual"	=> "app_calculadora_restar",
			"operador1"				=> $operador1,
			"operador2"				=> $operador2,
			"operando"				=> "➖",
			"resultado"				=> $resultado
		]);
	}
	
//╔═════  MULTIPLICAR  ═════╗
	/**
	 * @Route(
	 *     path	= "/multiplicar",
	 *     name	= "app_calculadora_multiplicar"
	 * )
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function multiplicarAction(){
	 // Resultado
		return $this->render(":calculadora:formulario.html.twig",[
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
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function doMultiplicarAction(Request $request){
	 // Datos
		$operador1		= $request->request->get("operador1");
		$operador2		= $request->request->get("operador2");
		
	 // Operaciones
		$this->calculadora
			->setOperador1(new RacionalService($operador1))
			->setOperador2(new RacionalService($operador2))
			->multiplicar();
		
	 // Resultado
		$resultado	= $this->calculadora->getResultado()->getNumerador();
		
		return $this->render(":calculadora:resultado.html.twig",[
			"titulo"				=> "Multiplicar",
			"rutaOperacionActual"	=> "app_calculadora_multiplicar",
			"operador1"				=> $operador1,
			"operador2"				=> $operador2,
			"operando"				=> "✖",
			"resultado"				=> $resultado
		]);
	}
	
//╔═════  DIVIDIR  ═════╗
	/**
	 * @Route(
	 *     path	= "/dividir",
	 *     name	= "app_calculadora_dividir"
	 * )
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function dividirAction(){
	 // Resultado
		return $this->render(":calculadora:formulario.html.twig",[
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
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function doDividirAction(Request $request){
	 // Datos
		$operador1		= $request->request->get("operador1");
		$operador2		= $request->request->get("operador2");
		
	 // Operaciones
		$this->calculadora
			->setOperador1(new RacionalService($operador1))
			->setOperador2(new RacionalService($operador2))
			->dividir_Decimal();
		
	 // Resultado
		$resultado	= $this->calculadora->getResultado()->getNumerador();
		
		return $this->render(":calculadora:resultado.html.twig",[
			"titulo"				=> "Dividir",
			"rutaOperacionActual"	=> "app_calculadora_dividir",
			"operador1"				=> $operador1,
			"operador2"				=> $operador2,
			"operando"				=> "➗",
			"resultado"				=> $resultado
		]);
	}
}