<?php
/**
 * Creado con PhpStorm.
 * Usuario: Soreoniem (Juan Lu)
 * Fecha: 11/10/2016
 * Hora: 17:53
 */
chdir(dirname(__DIR__));


require "application/controllers/IndexController.php";
require "application/controllers/CalculadoraController.php";

if( ! isset($_GET["controller"]) ){
    $controllerName = "controllers\\IndexController";
    $action         = "indexAction";
} else {
    $controllerName = "controllers\\". ucfirst($_GET["controller"]) ."Controller";
    $action         = $_GET["action"] ."Action";
}

$controller = new $controllerName();
return $controller->$action();