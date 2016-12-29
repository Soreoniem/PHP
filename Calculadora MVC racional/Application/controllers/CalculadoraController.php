<?php
/**
 * Creado con PhpStorm.
 * Usuario: Juan Lux
 * Fecha: 21/10/2016
 * Hora: 15:52
 */

namespace controllers;

/* NECESARIO
	• doSumarAction → modelo calculadora

	► Luego crear la vista resultado
*/
class CalculadoraController{
	public function sumarAction(){
		$action = "doSumar";
		$operador = "➕";
		return require "application/views/formulario.html";
	}

	public function doSumarAction(){
	}
}