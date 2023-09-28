<?php

namespace DFramework\Router;

class Router{

	/** TODO: ERWEITERUNG ROUTINGMAP (ALTER ROUTINGLOADER)*/

	private $request;

	public function __construct($services){
		/* GET REQUEST OBJECT*/
		$this->request = $services['request'];

	}

	public function buildRoute(){
		return $this->request->getRoute();
	}
}