<?php
/**
 * @link http://www.phoffa.codeboulevardsystems.com/
 * @copyright Copyright (c) 2014 CodeBoulevard Systems.
 * @license http://www.phoffa.codeboulevardsystems.com/license/
 * @Author Yusuf Samsudeen Babashola (Algorithm)
 */
namespace phoffa;

$config=[
	"app_root"=>approot,
	"coagulate"=>true,
	"MVC_FOLDER"=>[
		"Controllers"=>
				["name"=>"controllers","sub_directory"=>true],
		"Models"=>
				["name"=>"models","sub_directory"=>true],
		"Views"=>
				["name"=>"views","sub_directory"=>true]

	]
];
return $config;
?>