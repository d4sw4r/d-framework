<?php

namespace DFramework\Controller;

class FrontController{
	private $dispatcher;
	private $router;

	
	public function __construct($dispatcher, $router){
		$this->dispatcher = $dispatcher;
		$this->router = $router;

	}

	public function run(){
		$route = $this->getRouter()->buildRoute();
		$this->getDispatcher()->setRoute($route);
		$this->getDispatcher()->dispatch();
	}

	public function getRouter(){
		return $this->router;
	}

	public function getDispatcher(){
		return $this->dispatcher;
	}
} 