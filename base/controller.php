<?php
/**
 * @link http://www.phoffa.codeboulevardsystems.com/
 * @copyright Copyright (c) 2014 CodeBoulevard Systems.
 * @license http://www.phoffa.codeboulevardsystems.com/license/
 */
namespace phoffa;
use constants;
class Controller {
	private $config;
	function __construct(){
		$this->config=require('config.php');
	}

	function execute(){
		$request_uri=$_SERVER['REQUEST_URI'];
		$url_array=explode('/',$request_uri);
		echo $request_uri.'<br/>';
		print_r($url_array);
	}
	
	
}
?>