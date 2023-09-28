<?php

namespace DFramework\Dispatcher;

use DFramework\Request\Request;

class Dispatcher{

	private $route;
	 
    private function getController($name)
    {
    	var_dump($name);
        if( 0 <strlen($name)){
            $controller = sprintf('Modules\%sController', $name, $name);
        }
        var_dump($controller);die;
        if(!class_exists($controller, true)){
                throw new Exception(sprintf('The requested controller %s does not exist',
                                            $controller));
        }
 
        return new $controller();
    }
 
    private function getAction($name, $controller)
    {

        $action  = sprintf('execute%s', 'index');
        if( 0 <strlen($name)){
            $action = sprintf('execute%s',ucfirst($name));
        }

        if(!method_exists($controller,$action)){
        throw new Exception(sprintf('The requested controller has no action %s',
                            $name));
        }
        return $action;
    }
 
   
    public function dispatch()
    {
        list($name, $action) = explode('/', $this->getRoute());
        $controller          = $this->getController($name);
        call_user_func_array(array($controller, $this->getAction($action,$controller)),array($request));
    }

    public function setRoute($route){
    	$this->route = $route;
    }
    public function getRoute(){
    	return $this->route;
    }
}

