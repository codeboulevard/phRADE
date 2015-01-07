<?php
/**
 * @link http://www.phoffa.codeboulevardsystems.com/
 * @copyright Copyright (c) 2014 CodeBoulevard Systems.
 * @license http://www.phoffa.codeboulevardsystems.com/license/
 * @Author Yusuf Samsudeen Babashola (Algorithm)
 */
include_once ('commonsutility.php');
function __autoload($class){
	
	$filename=basename($class);
	$dirname=str_replace("phoffa","",dirname($class));
	$com=new commons();
	$filename=$com->getFile($filename.'.php',"");
	//$filename=__DIR__.$dirname.DIRECTORY_SEPARATOR.$filename.".php";
	if(file_exists($filename)){
		require $filename;
	}	
	else{
		echo "Class ".basename($class).' does not exist<br/>';
	}
    
}
?>