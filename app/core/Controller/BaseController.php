<?php
namespace DFramework\Controller;

use Twig_Environment;
use Twig_Loader_Filesystem;
class BaseController{
	private $twig;
	
	public function __construct(){
		$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../../' . 'tpl');
		$this->twig = new \Twig_Environment($loader);	
	}

	public function render($template, $data){
		
		 echo $this->twig->render($template, $data);
	}

	public function indexbyname($bla){
		
		 echo $this->twig->render('index.html.twig', array('name' => $bla));
	}
}