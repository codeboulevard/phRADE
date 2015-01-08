<?php
/**
 * @link http://www.phoffa.codeboulevardsystems.com/
 * @copyright Copyright (c) 2014 CodeBoulevard Systems.
 * @license http://www.phoffa.codeboulevardsystems.com/license/
 * @Author Yusuf Samsudeen Babashola (Algorithm)
 */
namespace phoffa\core;
use phoffa\core\environment as env;
use phoffa\utility\utility as util;

class Application{

	private $REQUEST_URI;
	private $config=[];
	private $controller_list;
	private $model_list;
	private $view_list;
	private $router;
	function __construct(){
		$this->REQUEST_URI=$_SERVER['REQUEST_URI'];
		define('approot',util::getApproot());
		$this->config=(require ( util::getFile('config.php','',true) ));
		$this->define_constants();
		$GLOBALS['phoffaControllers']=realpath(phoffaControllers);
		define('baseurl',util::getBaseURL());
	}

	function fireApp(){		
		$this->loadControllers(realpath(phoffaControllers));
		$this->loadModels(realpath(phoffaModels));
		$this->loadViews(realpath(phoffaViews));
		$router=new Router($this->controller_list,$this->view_list,$this->REQUEST_URI);
		$router->routeRequest();
	}

	function getController(){	
		$REQUEST_URI=$this->REQUEST_URI;
	}

	function define_constants(){
		$config=$this->config;
		define('separator',DIRECTORY_SEPARATOR);
		define('phoffaControllers',$config['MVC_FOLDER']['Controllers']['name']);
		define('phoffaControllersSubDirectory',$config['MVC_FOLDER']['Controllers']['sub_directory']);
		define('phoffaModels',$config['MVC_FOLDER']['Models']['name']);
		define('phoffaModelsSubDirectory',$config['MVC_FOLDER']['Models']['sub_directory']);
		define('phoffaViews',$config['MVC_FOLDER']['Views']['name']);
		define('phoffaViewsSubDirectory',$config['MVC_FOLDER']['Views']['sub_directory']);
	}

	function is_php($filename){
		$value=false;
		$ext=substr($filename,strrpos($filename,'.')+1,3);
		if($ext==='php'){
			$value=true;
		}
		return $value;
	}

	function loadControllers($dirpath){
		$dirs=scandir($dirpath);
		if((is_array($dirs)) AND !empty($dirs)){
			foreach ($dirs as $dir) {
				if(($dir!=='.') AND ($dir!=='..')){
					$file_real_path=realpath($dirpath.separator.$dir);
					if(is_dir($file_real_path)){
						$this->loadControllers($file_real_path);
					}
					else{
						if ($this->is_php($file_real_path)) {
							$this->controller_list[]=$dir;
						}
						
					}
				}
			}
		}
	}

	function loadModels($dirpath){
		$dirs=@scandir($dirpath);
		if((is_array($dirs)) AND !empty($dirs)){
			foreach ($dirs as $dir) {
				if(($dir!=='.') AND ($dir!=='..')){
					$file_real_path=realpath($dirpath.separator.$dir);
					if(is_dir($file_real_path)){
						$this->loadModels($file_real_path);
					}
					else{
						if ($this->is_php($file_real_path)) {
							$this->model_list[]=$file_real_path;
						}
						
					}
				}
			}
		}
	}

	function loadViews($dirpath){
		$dirs=@scandir($dirpath);
		if((is_array($dirs)) AND !empty($dirs)){
			foreach ($dirs as $dir) {
				if(($dir!=='.') AND ($dir!=='..')){
					$file_real_path=realpath($dirpath.separator.$dir);
					if(is_dir($file_real_path)){
						$this->loadloadViews($file_real_path);
					}
					else{
						if ($this->is_php($file_real_path)) {
							$this->view_list[]=$file_real_path;
						}
						
					}
				}
			}
		}
	}
}
?>