<?php
/**
 * Creado con PhpStorm.
 * Usuario: Juan Lux
 * Fecha: 21/10/2016
 * Hora: 16:36
 */

namespace models;

/* Anterior necesidad: CalculadoraController.php → doSumarAction(): necesita modelo calculadora
 NECESITA:
	• Racionales para las variables privadas.
*/
/*
	► Luego ir a CalculadoraController → doSumarAction(): crear new modelo
*/
use models\Racional; require "application/models/RacionalModel.php";
class CalculadoraModel{// Necesita racionales
//╔═════  ATRIBUTOS  ═════╗
	/**
	 * @var Racional $operador1
	 * @var Racional $operador2
	 * @var Racional $resultado
	 */
	private $operador1;
	private $operador2;
	private $resultado;

//╔═════  CONSTRUCTOR  ═════╗
	/**
	 * CalculadoraModel constructor.
	 * @param Racional $operador1
	 * @param Racional $operador2
	 */
	public function __construct($operador1 = null, $operador2 = null){
	}

//╔═════  GET | SET  ═════╗
	/**
	 * @return Racional
	 */
	private function getOperador1(){
		return $this->operador1;
	}
	
	/**
	 * @return Racional
	 */
	private function getOperador2(){
		return $this->operador2;
	}
	
	/**
	 * @param Racional $racional
	 */
	private function setOperador1($racional){
		$this->operador1->getNumerador();
	}

//╔═════  METODOS  ═════╗
}