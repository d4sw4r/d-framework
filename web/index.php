<?php

require __DIR__ . '/../vendor/autoload.php';

use DFramework\Services\ServiceBuilder;
use DFramework\Dispatcher\Dispatcher;
use DFramework\Router\Router;
use DFramework\Controller\FrontController;


session_start();
/* INIT SERVICES*/
$builder = new ServiceBuilder();
$services = $builder->getContainer();



/* CREATE FRONTCONTROLLER AND LET HIM WORK*/
$frontController = new FrontController(new Dispatcher(), new Router($services));
$frontController->run();

/* DONE HERE*/

