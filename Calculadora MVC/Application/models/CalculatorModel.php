<?php
/**
 * Created by PhpStorm.
 * User: Juan Lux
 * Date: 11/10/2016
 * Time: 19:37
 */

namespace models;


class CalculatorModel
{
//╔═════  ATRIBUTOS  ═════╗
    private $op1;
    private $op2;
    private $resultado;

//╔═════  CONSTRUCTOR  ═════╗
    public function __construct($op1, $op2){
        $this->setOp1($op1);
        $this->setOp2($op2);
    }

//╔═════  GET | SET  ═════╗
    private function getOp1(){
        return $this->op1;
    }
    private function getOp2(){
        return $this->op2;
    }
    public function getResultado(){
        return $this->resultado;
    }

    private function setOp1( $ope1 ){
        $this->op1 = (int) $ope1;
        return $this;
    }
    private function setOp2( $op2 ){
        $this->op2 = (int) $op2;
        return $this;
    }
    public function setResultado( $resultado ){
        $this->resultado = (int) $resultado;
        return $this;
    }

//╔═════  METODOS  ═════╗

    public function sumar(){
        $formula = $this->getOp1() + $this->getOp2();
        $this->setResultado( $formula );
    }

    public function restar(){
        $formula = $this->getOp1() - $this->getOp2();
        $this->setResultado( $formula );
    }

    public function multiplicar(){
        $formula = $this->getOp1() * $this->getOp2();
        $this->setResultado( $formula );
    }

    public function dividir(){
        if($this->getOp2() == 0){ $this->setOp2(1); }
        $formula = $this->getOp1() / $this->getOp2();
        $this->setResultado( $formula );
    }
}