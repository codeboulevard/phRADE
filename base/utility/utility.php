<?php
/**
 * @link http://www.phoffa.codeboulevardsystems.com/
 * @copyright Copyright (c) 2014 CodeBoulevard Systems.
 * @license http://www.phoffa.codeboulevardsystems.com/license/
 * @Author Yusuf Samsudeen Babashola (Algorithm)
 */
namespace phoffa\utility;

class utility{


	static function getFile($filename,$dirs="",$exact=true){	
		$remove=DIRECTORY_SEPARATOR."base".DIRECTORY_SEPARATOR."utility";
		if(empty($dirs)){
			$dirs=dirname(dirname(dirname(__FILE__)));
		}
		static $_filepath=array();
		if(empty($filename)){
			return null;
		}
		else{
			if(!is_dir($dirs)){
				return null;
			}
			$dir = scandir($dirs);
		    if(is_array($dir) AND !empty($dir)){
			    foreach($dir as $file){
				    if(($file !== '.') AND ($file!=='..')){
					    if (is_file($dirs.DIRECTORY_SEPARATOR.$file)){
					        $filepath =  realpath($dirs.DIRECTORY_SEPARATOR.$file);
					        if(!$exact){
					            $pos = strpos($file,$filename);
					            if($pos === false) {
					            }
					            else {
					                if(file_exists($filepath) AND is_file($filepath)){
					                	$_filepath[]=$filepath;
					                }
					            }
					        }
					        elseif(($file == $filename)){				 
					            if(file_exists($filepath) AND is_file($filepath)){
					                $_filepath[]=$filepath;
					            }
					        }
					    }
					    else{
					        utility::getFile($filename,$dirs.DIRECTORY_SEPARATOR.$file,$exact);
					    }
				    }
			    }		    
		    }
		    if($exact){
		    	return end($_filepath);
		    }
		    else{
		    	return $_filepath;
		    }

		}
	}

	static function getAppRoot(){		
		return dirname(dirname(dirname(__FILE__)));
	}
}
?>