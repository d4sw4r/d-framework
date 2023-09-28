<?php

namespace DFramework\Request;

class Request{

	private $session;

	public function __construct(){
		$this->session = session_id();
	}

	/**
     * Returns the requested route
     * @return string
     */
    public function getRoute()
    {
        $route = '/';
        if (isset($_SERVER['REQUEST_URI']))
         $route = $_SERVER['REQUEST_URI'];
        if (isset($_SERVER['ORIG_PATH_INFO']))
                $route = $_SERVER['ORIG_PATH_INFO'];
        return trim(strip_tags(urldecode($route)),'/');
    }

    public function getType(){
    	return $_SERVER['REQUEST_METHOD'];
    }

    public function getSession(){
    	return $_SESSION['sid'];
    }

    public function addSession($key, $value){
    	$_SESSION[$key] = $value;
    }

}

 