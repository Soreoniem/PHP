<?php
/**
 * Created by PhpStorm.
 * User: Juan Lux
 * Date: 30/09/2016
 * Time: 15:49
 */

namespace Modelo;

require_once 'Punto.php';
require_once 'Figura.php';

class Circulo extends Figura
{
//╔═════  ATRIBUTOS  ═════╗
    /**
     * @var Punto
     */
    private $radio;

//╔═════  CONSTRUCTOR  ═════╗
    public function __construct($radio){
        parent::__construct();
        $this->setRadio($radio);
    }

//╔═════  GET | SET  ═════╗
    private function getRadio(){
        return $this->radio;
    }

    private function setRadio($radio){
        $this->radio = (int) $radio;
        return $this;
    }

//╔═════  METODOS  ═════╗
    public function area(){
        $formula = pi() * pow($this->getRadio(), 2);
        return round($formula, 2);
    }

    public function escalar($num){
        $num = (int) $num;
        if( $num >= 1 ){
            $this->setRadio($this->getRadio() * $num);
        } else if($num <= (-1)) {
            $this->setRadio( $this->getRadio() / abs($num) );
        }
    }

    public function esIgual(Figura $circulo2){
        $circulo2 = (object) $circulo2;
        return ( parent::esIgual( $circulo2 )
                && $this->getRadio() == $circulo2->getRadio());
    }

    public function perimetro(){
        $formula = 2 * pi() * $this->getRadio();
        return round($formula);
    }

    public function __toString(){
        return "Círculo[ ". parent::__toString() .", ". $this->getRadio() ."]";
    }
}