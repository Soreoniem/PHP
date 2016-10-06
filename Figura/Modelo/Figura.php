<?php
/**
 * Created by PhpStorm.
 * User: Juan Lux
 * Date: 04/10/2016
 * Time: 18:43
 */

namespace Modelo;

require_once 'Punto.php';
abstract class Figura
{
//╔═════  ATRIBUTOS  ═════╗
    /**
     * @var Punto
     */
    protected $origen;
    private static $numFiguras = 0;

    function __construct(){
        self::$numFiguras++;
        $this->setOrigen( new Punto(0, 0) );
    }

//╔═════  GET | SET  ═════╗
    protected function setOrigen(Punto $origen){
        $this->origen = $origen;
    }
    protected function getOrigen(){
        return $this->origen;
    }

//╔═════  METODOS  ═════╗
    public function desplazar(Punto $punto){
        $this->setOrigen($punto);
    }

    public function distancia(Figura $figura){
        return $this->getOrigen()->distancia( $figura->getOrigen() );
    }

    public function esIgual(Figura $circulo22){
        return ( $this->getOrigen()->esIgual( $circulo22->getOrigen() ) );
    }

    public static function getNumFiguras(){
        return self::$numFiguras;
    }

    abstract public function area();
    abstract public function escalar($num);
    abstract public function perimetro();

    public function __toString(){
        return $this->getOrigen()->__toString();
    }
}