<?php
namespace Modules;

use DFramework\Services\ServiceBuilder;
use DFramework\Controller\BaseController;

class WebsiteController extends BaseController{
	
	
	public function __construct(){
		parent::__construct();
		$builder = new ServiceBuilder();
		$services = $builder->getContainer();

			
	}

	public function executeindex(){
		 echo $this->render('index.html.twig', array('name' => 'Du'));
	}

	public function executeindexbyname(){
		
		 echo $this->render('index.html.twig', array('name' => 'foo'));
	}
}