<?php
/**
 * @link http://www.phoffa.codeboulevardsystems.com/
 * @copyright Copyright (c) 2014 CodeBoulevard Systems.
 * @license http://www.phoffa.codeboulevardsystems.com/license/
 * @Author Yusuf Samsudeen Babashola (Algorithm) 
 */
namespace phoffa\core;
use phoffa\utility\utility as util;
class Controller{

	function __construct(){
		
	}

	function renderView($viewName){
		require(util::getFile($viewName,phoffaViews,true));
	}


	function __404(){
		include(util::getFile('404.php','',true));
	}
	function index(){
		echo 'welcome to phoffa';
	}
}
?>