<?php
/**
 * Creado con PhpStorm.
 * Usuario: Juan Lux
 * Fecha: 21/11/2016
 * Hora: 12:38
 */

namespace AppBundle\Service;


class RacionalService{
//╔═════  ATRIBUTOS  ═════╗
	/** @var double|int $numerador */
	private $numerador;
	
	/** @var double|int $denominador */
	private $denominador;

//╔═════  CONSTRUCTOR  ═════╗
	public function __construct($numerador = 0, $denominador = 1){
		$this->setNumerador($numerador)
			->setDenominador($denominador);
	}

//╔═════  GET | SET  ═════╗
	/**
	 * @return double|int
	 */
	public function getNumerador(){
		return $this->numerador;
	}
	
	/**
	 * @return double|int
	 */
	public function getDenominador(){
		return $this->denominador;
	}
	
	/**
	 * @param double|int $numerador
	 * @return $this
	 */
	public function setNumerador($numerador){
		$this->numerador	= (double) $numerador;
		
		return $this;
	}
	
	/**
	 * @param double|int $denominador
	 * @return $this
	 */
	public function setDenominador($denominador){
		// Posible error 0
		if( (int) $denominador == 0 ) $denominador = 1;
		
		$this->denominador	= (double) $denominador;
		
		return $this;
	}
	
	// Logica dificil de programa :S
	public function reducirFraccion(){
		// En contrsucción
		do{
			$salir	= false;
			$numerador		= $this->getNumerador();
			$denominador	= $this->getDenominador();
			
			 // El racional es reducible
			if( $numerador == 1 || $denominador == 1
				|| $numerador == -1 || $denominador == -1){
				$salir	= true;
				
			} else if( $numerador == $denominador ){
				$this
					->setNumerador(1)
					->setDenominador(1);
				$salir	= true;
				
			} else if( ((double) $numerador /(double) 2) != 1
				&& ((double) $denominador /(double) 2) != 1
				&& ($denominador % ((double) $numerador /(double) 2) === 0
				|| $numerador % ((double) $denominador /(double) 2) === 0) ){
				if($numerador < $denominador){
					$this
						->setNumerador($numerador / ($numerador /2))
						->setDenominador($denominador / ($numerador /2));
				} else {
					$this
						->setNumerador($numerador / ($denominador /2))
						->setDenominador($denominador / ($denominador /2));
				}
				
			} else if( ($numerador != 1 && $denominador != 1 )
				&& ($numerador % $denominador === 0
					|| $denominador % $numerador === 0) ){
				if( $numerador < $denominador ){
					$this
						->setNumerador($numerador /$numerador)
						->setDenominador($denominador /$numerador);
				} else {
					$this
						->setNumerador($numerador /$denominador)
						->setDenominador($denominador /$denominador);
				}
				
			} else if( $numerador %2 === 0
				&& ceil($numerador) != 1
				&& $denominador %2 === 0
				&& ceil($denominador) != 1 ){
				$this
					->setNumerador($numerador /2)
					->setDenominador($denominador /2);
				
			 // El racional ya no es reducible
			} else {
				$salir	= true;
			}
			
		}while(! $salir);
	}
	
}