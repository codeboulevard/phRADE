<?php
/**
 * @link http://www.phoffa.codeboulevardsystems.com/
 * @copyright Copyright (c) 2014 CodeBoulevard Systems.
 * @license http://www.phoffa.codeboulevardsystems.com/license/
 * @Author Yusuf Samsudeen Babashola (Algorithm)
 */
class commons{
	private $_filepath="";
	function getFile($filename,$dirs=""){	
 	
		if(empty($dirs)){
			$dirs=dirname(dirname(__FILE__));
		}
		$dir = scandir($dirs);
		    if(is_array($dir) AND !empty($dir)){
			    foreach($dir as $file){
				    if(($file !== '.') AND ($file!=='..')){
					    if (is_file($dirs.DIRECTORY_SEPARATOR.$file)){
					        $filepath =  realpath($dirs.DIRECTORY_SEPARATOR.$file);
					       if(($file === $filename)){				 
					            if(file_exists($filepath) AND is_file($filepath)){
					                $this->_filepath=$filepath;
					            }
					        }
					    }
					    else{
					        $this->getFile($filename,$dirs.DIRECTORY_SEPARATOR.$file);
					    }
					}
				}
			}		    
		
		return  $this->_filepath;
	}

}
?>