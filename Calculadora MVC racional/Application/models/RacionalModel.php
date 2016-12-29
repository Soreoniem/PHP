<?php
/**
 * Creado con PhpStorm.
 * Usuario: Juan Lux
 * Fecha: 21/10/2016
 * Hora: 16:45
 */

namespace models;


class Racional{
//╔═════  ATRIBUTOS  ═════╗
	/**
	 * @var integer $numerador
	 * @var integer $denominador
	 */
	private $numerador;
	private $denominador;
	
//╔═════  CONSTRUCTOR  ═════╗
	/**
	 * Racional constructor.
	 * @param null $numerador
	 * @param int $denominador
	 */
	public function __construct($numerador = null, $denominador = 1){
		$this->setNumerador($numerador);
		$this->setDenominador($denominador);
	}

//╔═════  GET | SET  ═════╗
	/**
	 * @return mixed
	 */
	public function getNumerador(){
		return $this->numerador;
	}
	
	/**
	 * @return integer
	 */
	public function getDenominador(){
		return $this->denominador;
	}
	
	/**
	 * @param integer $numero
	 * @return $this
	 */
	public function setNumerador($numero){
		$this->numerador = (int) $numero;
		return $this;
	}
	
	/**
	 * @param integer $numero
	 * @return $this
	 */
	public function setDenominador($numero){
		if($numero == 0) $numero = 1;
		$this->denominador = (int) $numero;
		return $this;
	}

//╔═════  METODOS  ═════╗
	/**
	 * @param Racional $racional
	 * @return Racional
	 */
	public function sumar($racional){
		$numerador = $this->getNumerador() + $racional->getNumerador();
		return new Racional($numerador);
	}
	
	/**
	 * @param Racional $racional
	 * @return Racional
	 */
	public function restar($racional){
		$numerador = $this->getNumerador() + $racional->getNumerador();
		return new Racional($numerador);
	}
	
	/**
	 * @param Racional $racional
	 * @return Racional
	 */
	public function multiplicar($racional){
		$numerador		= $this->getNumerador()		* $racional->getNumerador();
		$denominador	= $this->getDenominador()	* $racional->getDenominador();
		
		return new Racional();
	}
	
	/**
	 * @param Racional $racional
	 * @return Racional
	 */
	public function dividir($racional){
		$numerador		= $this->getNumerador()		* $racional->getDenominador();
		$denominador	= $this->getDenominador()	* $racional->getNumerador();
		
		return new Racional($numerador, $denominador);
	}
}