<?php
/**
 * Creado con PhpStorm.
 * Usuario: Juan Lux
 * Fecha: 11/10/2016
 * Hora: 20:18
 */

namespace controllers;


class IndexController
{
    public function indexAction(){
        require "application/views/index.html";
    }
}