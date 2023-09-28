<?php

class Router{

   private $path;
   private $routes;

   public function __construct(array $routes) {
   	$parsed_url = parse_url($_SERVER['REQUEST_URI']);//URI zerlegen
		if(isset($parsed_url['path'])){
			$this->path = trim($parsed_url['path'],'/');
		}else{
			$this->$path = '';
		}
	$this->routes = $routes;
   	}

   	public function getPath(){
   		return $this->path;
   	}
	
	public function getRoutes(){
   		return $this->routes;
   }

   public function getController(){
   		foreach ($this->routes as $route) {

			if($this->path == $route[0]){
				return $route[1];
			}	
		}

		return '404';
   }	
}