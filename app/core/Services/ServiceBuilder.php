<?php

namespace DFramework\Services;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use DFramework\Example\Model\Database;
use Pimple\Container;
use DFramework\Request\Request;


class ServiceBuilder{

	private $container;

	public function __construct(){

	$this->container = new Container();	

	$this->container['tpldir'] = function($c){
		return 'tpl';
	};
	$this->container['router'] = function ($c) {
		return new Router($container['routes']);
	};

	$this->container['logger'] = function ($c) {
		$log = new Logger('default');
		$log->pushHandler(new StreamHandler(__DIR__ . '/../' . $container['logdir'] . '/' .  $container['logfile'] , Logger::WARNING));
    return $log;
	};

	$this->container['twig'] = function ($c) {
		$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../../' . $this->container['tpldir']);
	return new \Twig_Environment($loader);
	};

	$this->container['database'] = function ($c) {
		return new Database( $container['dbhost'],
						$container['dbport'],
						$container['dbuser'],
						$container['dbpass'],
						$container['dbdatabase']
					);
		};

	$this->container['request'] = function ($c) {
		return new Request();
		};	

	
	}

public function getContainer(){
	return $this->container;
}
}
