<?php
/**
 * Creado con PhpStorm.
 * Usuario: Juan Lux
 * Fecha: 15/11/2016
 * Hora: 20:35
 */

namespace AppBundle\Service\calculadoraRacional;


class RacionalService{
//╔═════  ATRIBUTOS  ═════╗
	/**
	 * @var int $numerador
	 */
	private $numerador;
	/**
	 * @var int $denominador
	 */
	private $denominador;
	/**
	 * @var RacionalService $resultado
	 */
	private $resultado;

//╔═════  CONSTRUCTOR  ═════╗
	public function __construct($numerador = 0, $denominador = 1){
		$this->setNumerador($numerador)
			->setDenominador($denominador);
	}

//╔═════  GET | SET  ═════╗
	/**
	 * @return int
	 */
	public function getNumerador(){
		return $this->numerador;
	}
	
	/**
	 * @return int
	 */
	public function getDenominador(){
		return $this->denominador;
	}
	public function getResultado(){
		return $this->resultado;
	}
	
	/**
	 * @param int $numerador
	 * @return $this
	 */
	public function setNumerador($numerador){
		// Dividendo inferior a 0
		if( (int) $numerador < 0){
			$numerador = 0; }
		
		$this->numerador	= (int) $numerador;
		
		return $this;
	}
	
	/**
	 * @param int $denominador
	 * @return $this
	 */
	public function setDenominador($denominador){
		// Divisor inferior a 0
		if( (int) $denominador < 1){
			$denominador = 1; }
		
		$this->denominador	= (int) $denominador;
		
		return $this;
		
	}
	
	/**
	 * @param RacionalService $racional
	 * @return $this
	 */
	private function setResultado($racional){
		$this->setNumerador($racional->getNumerador());
		$this->setDenominador($racional->getDenominador());
		
		return $this;
	}

//╔═════  METODOS  ═════╗
	/**
	 * @param RacionalService $racional
	 */
	public function sumar(RacionalService $racional){
		$numerador1	= $this->getNumerador() * $racional->getDenominador();
		$numerador2	= $this->getDenominador() * $racional->getNumerador();
		$denominador	= $this->getDenominador() * $racional->getDenominador();
		
		$this->setResultado(new RacionalService($numerador1 + $numerador2, $denominador));
	}
	
	/**
	 * @param RacionalService $racional
	 */
	public function restar(RacionalService $racional){
		$denominador	= $this->getDenominador() * $racional->getDenominador();
		$numerador1		= ($denominador / $this->getDenominador()) * $this->getNumerador();
		
		$numerador2		= ($denominador / $racional->getDenominador()) * $racional->getNumerador();
		
		$this->setResultado(new RacionalService($numerador1 + $numerador2, $denominador));
	}
	// Siguiente: Multiplicar y dividir

}