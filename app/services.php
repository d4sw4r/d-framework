<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use DFramework\Example\Model\Database;


$container['router'] = function (Pimple\Container $container) {
	return new Router($container['routes']);
};

$container['logger'] = function (Pimple\Container $container) {
	$log = new Logger('default');
	$log->pushHandler(new StreamHandler(__DIR__ . '/../' . $container['logdir'] . '/' .  $container['logfile'] , Logger::WARNING));
    return $log;
};

$container['twig'] = function (Pimple\Container $container) {
	$loader = new Twig_Loader_Filesystem(__DIR__ . '/..' . $container['tpldir']);

	return new Twig_Environment($loader);
};


$container['database'] = function (Pimple\Container $container) {
	return new Database( $container['dbhost'],
						$container['dbport'],
						$container['dbuser'],
						$container['dbpass'],
						$container['dbdatabase']
					);
	};

