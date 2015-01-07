<?php
/**
 * @link http://www.phoffa.codeboulevardsystems.com/
 * @copyright Copyright (c) 2014 CodeBoulevard Systems.
 * @license http://www.phoffa.codeboulevardsystems.com/license/
 * @Author Yusuf Samsudeen Babashola (Algorithm)
 */
namespace phoffa\core;
use phoffa\core\Controller;
class Router{
	private $controller_list;
	private $view_list;
	private $REQUEST_URI;
	private $uri_array;
	private $controllerObject;
	private $action;
	function __construct($controller_list,$view_list,$REQUEST_URI){
		$this->controller_list=$controller_list;
		$this->view_list=$view_list;		
		$approot=str_replace(separator,"/",approot);
		$assumed_appname=substr($approot,strrpos($approot,"/")+1,strlen($approot));
		$REQUEST_URI=str_replace('/'.$assumed_appname.'/','',$REQUEST_URI);
		$this->REQUEST_URI=$REQUEST_URI;		
		$this->uri_array=explode("/",$this->REQUEST_URI);
		$this->controllerObject= new Controller();
		//$this->action='index';
		$this->getController();
	}

	function routeRequest(){
		$this->controllerObject->{$this->action}();
	}

	function getController(){
		$uri_array=$this->uri_array;
		$controller = isset($uri_array[0]) ? $uri_array[0] : '';
		array_shift($uri_array);
		$action = isset($uri_array[0]) ? $uri_array[0] : '';
	    array_shift($uri_array);
	    $this->getControllerObject($controller,$action);
	}



	function getView(){

	}

	function getControllerObject($controller,$action){
		$this->action='__404';
		if((!empty($controller)) ){			
			$controller_array=$this->filterArray($controller);
			foreach ($controller_array as $_controller) {
				$_controller=str_replace(".php",'', $_controller);
				if (((int)method_exists($_controller, $action)) AND (is_subclass_of($_controller,'phoffa\core\Controller'))){
					$this->controllerObject=new $_controller;
					$this->action=$action;
					break;
				}
				else{
					$this->action='__404';
				}
				
				
			}
			
		}
		else{			
			$this->controllerObject= new Controller();
			$this->action='index';
		}

	}

	function filterArray($controller){
		$filteredArray=array();
		foreach ($this->controller_list as $_controller) {
			if( (stripos($_controller,$controller)!==false) OR ($controller===$_controller)){
				$filteredArray[]=$_controller;
			}
		}
		return $filteredArray;
	}
}
?>