<?php

namespace controllers;


class IndexController{
	public function indexAction(){
		return require "application/views/index.html";
	}
}