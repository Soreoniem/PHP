<?php
/**
 * Creado con PhpStorm.
 * Usuario: Juan Lux
 * Fecha: 23/09/2016
 * Hora: 17:59
 */

namespace AppFigura;


use Modelo\Punto;       require_once '../Modelo/Punto.php';

use Modelo\Circulo;     require_once '../Modelo/Circulo.php';
use Modelo\Cuadrado;    require_once '../Modelo/Cuadrado.php';
use Modelo\Rectangulo;  require_once '../Modelo/Rectangulo.php';
use Modelo\Triangulo;   require_once '../Modelo/Triangulo.php';


class App
{
    public static function run(){   
// VARIABLES
    // variables
        $numObjetos = 2 ;                       // Cantidad de objetos (máximo 2)
        $activarEsIgual = true  ;               // Activa el comparador de objetos

        $probando   = "Rectangulo";             // Título
        $objeto1    = new Rectangulo(10, 5);    // Objeto 1
        $objeto2    = new Rectangulo(3, 8);     // Objeto 2

            // Se imprime el título y los objetos
            echo "<h1>$probando</h1>";
            echo $objeto1;
            if($numObjetos == 2) echo "<br/>". $objeto2;

    // acciones
        $titulo     = "Escalar";    // Título de la siguiente prueba
            //* Calculos: Calculos a pasar al resultado
                $objeto1->escalar(3);
                $objeto2->escalar(1.5);
            // */
        $resultado1 = $objeto1;     // Imprime el resultado del objeto 1
        $resultado2 = $objeto2;     // Imprime el resultado del objeto 2

    // salida (formato parrafo "p" o formato titulo "h") (h por defecto)
        $tipoEcho = "h";    // p o h

// IMPRIMIR
    // Segun las instrucciones de arriba imprime los resultados por html simple (sin css)
        // Solo 1 objeto
        if($numObjetos == 1){

            // tipo de salida html
            if($tipoEcho == "p"){
                echo "<p>";
                echo $titulo .": ". $resultado1;
                echo "</p>";

            } else {
                echo "<h2>$titulo</h2>";
                echo "<p>";
                echo $probando .": ". $resultado1;
                echo "</p>";
            }
            // Nota: No hay comparador con solo 1 objeto

        // 2 objetos
        } else if($numObjetos == 2){

            // tipo de salida (p o h)
            if($tipoEcho == "p"){
                echo "<p>";
                echo $titulo ." ". $probando ." (1): ". $resultado1;
                echo "<br/>". $titulo ." ". $probando ." (2): ". $resultado2;
                echo "</p>";

            } else {
                echo "<h2>$titulo</h2>";
                echo "<p>";
                    echo $probando ." (1): ". $resultado1;
                    echo "<br/>". $probando ." (2): ". $resultado2;
                echo "</p>";
            }

            // compara los objetos y le da un pequeño estilo rojo o verde
            if($activarEsIgual){
                echo "<p>";
                if($objeto1->esIgual($objeto2)){
                    echo "¿esIgual? <span style=\"color: green;\">Si</span>";;
                } else {
                    echo "¿esIgual? <span style=\"color: red;\">No</span>";
                }
                echo "</p>";
            }

        // Cuando no escojes 1 objeto o 2
        } else {
            echo "<p>Selecciona 1 o 2 objetos</p>";
        }
    }
}