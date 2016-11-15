<?php
/**
 * Creado con PhpStorm.
 * Usuario: Juan Lux
 * Fecha: 28/10/2016
 * Hora: 17:27
 */

namespace AppBundle\Service;


class CalculadoraService {
//╔═════  ATRIBUTOS  ═════╗
	/**
	 * @var int $op1
	 */
	private $op1;
	
	/**
	 * @var int $op2
	 */
	private $op2;
	
	/**
	 * @var int $resultado
	 */
	private $resultado;

//╔═════  CONSTRUCTOR  ═════╗
	/**
	 * Calculadora constructor.
	 * @param null $op1
	 * @param null $op2
	 */
	public function __construct($op1 = null, $op2 = null){
		$this->setOp1($op1)
			->setOp2($op2);
	}

//╔═════  GET | SET  ═════╗
	public function getOp1(){
		return $this->op1;
	}
	public function getOp2(){
		return $this->op2;
	}
	public function getResultado(){
		return $this->resultado;
	}
	
	public function setOp1($numero){
		$this->op1	= (int) $numero;
		return $this;
	}
	public function setOp2($numero){
		$this->op2	= (int) $numero;
		return $this;
	}
	public function setResultado($numero){
		$this->resultado	= (int) $numero;
	}

//╔═════  METODOS  ═════╗
	public function sumar(){
		$this->setResultado($this->getOp1() + $this->getOp2());
	}
	
	public function restar(){
		$this->setResultado($this->getOp1() - $this->getOp2());
	}
	
	public function multiplicar(){
		$this->setResultado($this->getOp1() * $this->getOp2());
	}
	
	public function dividir(){
		if($this->op2 == 0){
			$this->setResultado(0);
		} else {
			$this->setResultado($this->getOp1() / $this->getOp2());
		}
	}
}