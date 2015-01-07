<?php
/**
 * @link http://www.phoffa.codeboulevardsystems.com/
 * @copyright Copyright (c) 2014 CodeBoulevard Systems.
 * @license http://www.phoffa.codeboulevardsystems.com/license/
 * @Author Yusuf Samsudeen Babashola (Algorithm)
 */
namespace phoffa\core;

class environment{

	static function setDevEnvironment(){
		error_reporting(E_ALL);
		ini_set("display_errors",1);
	}
}
?>