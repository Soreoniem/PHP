<?php
/**
 * Creado con PhpStorm.
 * Usuario: Juan Lux
 * Fecha: 13/10/2016
 * Hora: 15:42
 */

namespace controllers;

use models\CalculatorModel; require "application/models/CalculatorModel.php";
class CalculatorController
{

    public function sumarAction(){
        $action = "doSumar";
        return require "application/views/form.html";
    }
    public function doSumarAction(){
        $model = new CalculatorModel($_POST["op1"], $_POST["op2"]);

        $model->sumar();
        $resultado = $model->getResultado();

        return require "application/views/resultado.html";
    }

    public function restarAction(){
        $action = "doRestar";
        return require "application/views/form.html";
    }
    public function doRestarAction(){
        $model = new CalculatorModel($_POST["op1"], $_POST["op2"]);

        $model->restar();
        $resultado = $model->getResultado();

        return require "application/views/resultado.html";
    }

    public function multiplicarAction(){
        $action = "doMultiplicar";
        return require "application/views/form.html";
    }
    public function doMultiplicarAction(){
        $model = new CalculatorModel($_POST["op1"], $_POST["op2"]);

        $model->multiplicar();
        $resultado = $model->getResultado();

        return require "application/views/resultado.html";
    }

    public function dividirAction(){
        $action = "doDividir";
        return require "application/views/form.html";
    }
    public function doDividirAction(){
        $model = new CalculatorModel($_POST["op1"], $_POST["op2"]);

        $model->dividir();
        $resultado = $model->getResultado();

        return require "application/views/resultado.html";
    }
}