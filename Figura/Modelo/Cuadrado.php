<?php
/**
 * Created by PhpStorm.
 * User: Juan Lux
 * Date: 04/10/2016
 * Time: 17:21
 */

namespace Modelo;

require_once 'Punto.php';
require_once 'Figura.php';

class Cuadrado extends Figura
{
//╔═════  ATRIBUTOS  ═════╗
    private $anchura;

//╔═════  CONSTRUCTOR  ═════╗
    public function __construct($anchura){
        parent::__construct();
        $this->setAnchura($anchura);
    }

//╔═════  GET | SET  ═════╗
    protected function getAnchura(){
        return round($this->anchura, 2);
    }

    protected function setAnchura($anchura){
        $this->anchura = (double) $anchura;
        return $this;
    }

//╔═════  METODOS  ═════╗
    public function area(){
        // anchura^2
        return pow($this->getAnchura(), 2);
    }

    public function escalar($num){
        $num = (double) $num;
        if( $num >= 1 ){
            $this->setAnchura($this->getAnchura() * $num);
        } else if($num <= (-1)) {
            $this->setAnchura( $this->getAnchura() / abs($num) );
        }
    }

    public function esIgual(Figura $cuadrado2){
        $cuadrado2 = (object) $cuadrado2;
        return ( parent::esIgual( $cuadrado2 )
            && $this->getAnchura() == $cuadrado2->getAnchura() );
    }

    public function perimetro(){
        return round($this->getAnchura() *4);
    }
//╔═══════════╗
//║ Escalar, toString ║
//╚═══════════╝
    public function __toString(){
        return "Cuadrado[ ". parent::__toString() .", ". $this->getAnchura() ."]";
    }
}