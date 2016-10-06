<?php
/**
 * Created by PhpStorm.
 * User: Juan Lux
 * Date: 30/09/2016
 * Time: 17:01
 */

namespace Modelo;

require_once 'Punto.php';
require_once 'Figura.php';

class Triangulo extends Figura
{
//╔═════  ATRIBUTOS  ═════╗
    /**
     * @var double $base
     * @var double $altura
     */
    private $base;
    private $altura;

//╔═════  CONSTRUCTOR  ═════╗
    public function __construct($base, $altura){
        parent::__construct();
        $this->setBase($base)
            ->setAltura($altura);
    }
//╔═════  GET | SET  ═════╗
    private function getBase(){
        return round($this->base, 2);
    }
    private function getAltura(){
        return round($this->altura, 2);
    }

    private function setBase($base){
        $this->base = (double) $base;
        return $this;
    }
    private function setAltura($altura){
        $this->altura = (double) $altura;
        return $this;
    }

//╔═════  METODOS ═════╗
    public function area(){
        $formula = $this->getBase() * $this->getAltura() /2;
        return round($formula);
    }

    public function escalar($num){
        $num = (double) $num;
        if( $num >= 1 ){
            $this->setBase( $this->getBase() * $num )
                ->setAltura( $this->getAltura() * $num );
        } else if($num <= (-1)) {
            $this->setBase( $this->getBase() / abs($num) )
                ->setAltura( $this->getAltura() / abs($num) );
        }
    }

    public function esIgual(Figura $triangulo2){
        $triangulo2 = (object) $triangulo2;
        return ( parent::esIgual( $triangulo2 )
            && $this->getBase() == $triangulo2->getBase()
            && $this->getAltura() == $triangulo2->getAltura() );
    }

    public function perimetro(){
        $formula = ((($this->getAltura() *2 + ($this->getBase() / 2) *2) *0.5) *2 + $this->getBase());
        return round($formula);
    }

    public function __toString()
    {
        return "Triángulo[ ". parent::__toString() .", ". $this->getBase() .", ". $this->getAltura() ."]";
    }
}