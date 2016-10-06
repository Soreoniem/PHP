<?php
/**
 * Created by PhpStorm.
 * User: Juan Lux
 * Date: 23/09/2016
 * Time: 17:35
 */

namespace Modelo;


class Punto
{
/*═════  ATRIBUTOS ═════ */
    private $x;
    private $y;

/*═════ CONSTRUCTOR ═════ */
    public function __construct($x, $y)
    {
        $this->setX($x);
        $this->setY($y);
    }

/*═════  GET | SET ═════ */
    private function getX(){
        return $this->x;
    }
    private function getY(){
        return $this->y;
    }

    private function setX($x){
        $this->x = (int) $x;
        return $this;
    }
    private function setY($y){
        $this->y = (int) $y;

        return $this;
    }

/*═════  METODOS ═════ */
    public function cambiarCuadrante($numCuadrante)
    {
        $x = $this->getX();
        $y = $this->getY();

        if($numCuadrante == 1){
            if($x < 0){ $this->setX(abs($x));}
            if($y < 0){ $this->setX(abs($x));}

        } else if($numCuadrante == 2){
            if($x < 0){ $this->setX(abs($x));}
            if($y > 0){ $this->setY($y * (-1));}

        } else if($numCuadrante == 3){
            if($x > 0){ $this->setX($x * (-1));}
            if($y > 0){ $this->setY($y * (-1));}

        } else {
            if($x > 0){ $this->setX($x * (-1));}
            if($y < 0){ $this->setX(abs($x));}
        }
    }

    public function comprobarCuadrante()
    {
        // +X +Y
        if( $this->getX() >= 0 && $this->getY() >= 0 ){
            return 1;

            // +X -Y
        } else if( $this->getX() >= 0 && $this->getY() < 0 ){
            return 2;

            // -X -Y
        } else if( $this->getX() < 0 && $this->getY() < 0 ){
            //SO
            return 3;

            // -X +Y
        }
        return 4;
    }

    public function desplazar(Punto $punDestino){
        $this->x = $punDestino->getX();
        $this->y = $punDestino->getY();
    }

    public function distancia(Punto $punto2){
        $punto = $this;
        $formula = sqrt(pow($punto2->getX() - $punto->getX(), 2) + pow($punto2->getY() - $punto->getY(), 2));

        return round($formula, 2);
    }

    public function esIgual(Punto $punto2){
        $punto = $this;
        return ( $punto->getX() == $punto2->getX()
                && $punto->getY() == $punto2->getY() );
    }

    public function __toString(){
        return "Punto[ ". $this->getX() .", ". $this->getY() .", Cuadrante ". $this->comprobarCuadrante() ."]";
    }
}