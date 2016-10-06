<?php
/**
 * Created by PhpStorm.
 * User: Juan Lux
 * Date: 04/10/2016
 * Time: 18:33
 */

namespace Modelo;

require_once 'Punto.php';
require_once 'Cuadrado.php';

class Rectangulo extends Cuadrado
{
//╔═════  ATRIBUTOS  ═════╗
    /**
     * @var double $altura
     */
    private $altura;

//╔═════  CONSTRUCTOR  ═════╗
    function __construct($anchura, $altura){
        parent::__construct($anchura);
        $this->setAltura($altura);
    }

//╔═════  GET | SET  ═════╗
    private function getAltura(){
        return round($this->altura, 2);
    }

    private function setAltura($altura){
        $altura = (double) $altura;
        $this->altura = $altura;
        return $this;
    }

//╔═════  METODOS  ═════╗
    public function area(){
        return $this->getAnchura() * $this->getAltura();
    }

    public function escalar($num){
        $num = (double) $num;
        parent::escalar($num);

        if( $num >= 1 ){
            $this->setAltura($this->getAltura() * $num);
        } else if($num <= (-1)) {
            $this->setAltura( $this->getAltura() / abs($num) );
        }
    }

    public function perimetro(){
        $formula = $this->getAnchura() *2 + $this->getAltura() *2;
        return $formula;
    }

    public function __toString(){
        return "Rectangulo[ ". parent::__toString() .", ". $this->getAltura() ."]";
    }
}