<?php
/**
 * Creado con PhpStorm.
 * Usuario: Juan Lux
 * Fecha: 18/11/2016
 * Hora: 17:28
 */

namespace AppBundle\Service;

use AppBundle\Service\RacionalService;

class CalculadoraService{
//╔═════  ATRIBUTOS  ═════╗
	/** @var RacionalService $operador1 */
	private $operador1;
	
	/** @var RacionalService $operador2 */
	private $operador2;
	
	/** @var RacionalService $resultado*/
	private $resultado;
	
//╔═════  CONSTRUCTOR  ═════╗
	// No requiere de constructor
		// Las variables ya tienen su constructor
	public function __construct(){
		$this->operador1	= new RacionalService();
		$this->operador2	= new RacionalService();
		$this->resultado	= new RacionalService();
	}

//╔═════  GET | SET  ═════╗
	/**
	 * @return RacionalService
	 */
	public function getOperador1(){
		return $this->operador1;
	}
	
	/**
	 * @return RacionalService
	 */
	public function getOperador2(){
		return $this->operador2;
	}
	
	/**
	 * @return RacionalService
	 */
	public function getResultado(){
		return $this->resultado;
	}
	
	/**
	 * @param RacionalService $racional
	 * @return $this
	 */
	public function setOperador1($racional){
		
		$this->operador1
			->setNumerador($racional->getNumerador())
			->setDenominador($racional->getDenominador());
		
		return $this;
	}
	
	/**
	 * @param RacionalService $racional
	 * @return $this
	 */
	public function setOperador2($racional){
		$this->operador2
			->setNumerador($racional->getNumerador())
			->setDenominador($racional->getDenominador());
		
		return $this;
	}
	
	/**
	 * @param RacionalService $racional
	 * @return $this
	 */
	private function setResultado($racional){
		$this->resultado
			->setNumerador($racional->getNumerador())
			->setDenominador($racional->getDenominador())
			->reducirFraccion();
		return $this;
	}

//╔═════  METODOS  ═════╗
	public function sumar(){
		$numerador1		= $this->getOperador1()->getNumerador()		* $this->getOperador2()->getDenominador();
		$numerador2		= $this->getOperador1()->getDenominador()	* $this->getOperador2()->getNumerador();
		$denominador	= $this->getOperador1()->getDenominador()	* $this->getOperador2()->getDenominador();
		
		$this->setResultado(new RacionalService($numerador1 + $numerador2, $denominador));
	}
	
	public function restar(){
		$denominador	= $this->getOperador1()->getDenominador() * $this->getOperador2()->getDenominador();
		$numerador1		= ($denominador / $this->getOperador1()->getDenominador()) * $this->getOperador1()->getNumerador();
		$numerador2		= ($denominador / $this->getOperador2()->getDenominador()) * $this->getOperador2()->getNumerador();
		
		$this->setResultado(new RacionalService($numerador1 - $numerador2, $denominador));
	}
	
	public function multiplicar(){
		$numerador		= $this->getOperador1()->getNumerador()		* $this->getOperador2()->getNumerador();
		$denominador	= $this->getOperador1()->getDenominador()	* $this->getOperador2()->getDenominador();
		
		$this->setResultado(new RacionalService($numerador, $denominador));
	}
	
	public function dividir_Decimal(){
		$numerador	= $this->getOperador1()->getNumerador() / $this->getOperador2()->getNumerador();
		
		$this->setResultado(new RacionalService($numerador, 1));
	}
	
	public function dividir_Racional(){
		$numerador		= $this->getOperador1()->getNumerador()		* $this->getOperador2()->getDenominador();
		$denominador	= $this->getOperador1()->getDenominador()	* $this->getOperador2()->getNumerador();
		
		$this->setResultado(new RacionalService($numerador, $denominador));
	}
}