<?php
namespace Core;

use Core\Config;

class Application
{

	static $instance;
	public $config = array();

	public function __construct($base_dir)
	{
		$this->config =  new Config($base_dir.DIRECTORY_SEPARATOR.'configs');
	}

	public static function getInstance($base_dir = BASEDIR)
	{
		if( empty(self::$instance) ){
			self::$instance = new self($base_dir);
		}
		return self::$instance;
	}

    public function dispatch()
    {
    	$url = $_SERVER['PATH_INFO'];
    	$route_conf = $this->config['route']['default'];
    	if( isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/' ){
    		$url = trim($url, '/'); //去掉左右两边的/
    		$url_array = explode('/', $url);
    		$module = !empty($url_array[0])  ? ucwords(trim($url_array[0])) : $route_conf['module'];
            define('ROUTE_M', $module);
    		$controller = !empty($url_array[1])  ? ucwords(trim($url_array[1])) : $route_conf['controller'];
            define('ROUTE_C', $controller);
    		$action = !empty($url_array[2])  ? strtolower(trim($url_array[2])) : $route_conf['action'];
            define('ROUTE_A', $action);

            $controller_low = strtolower($controller);

    		for ($i=0; $i < 3; $i++) { 
    			if( isset($url_array[$i]) ){
	    			unset($url_array[$i]);
	    		}
    		}

    		//处理后面的参数
    		if( !empty($url_array) ){
    			for($i=3; $i<count($url_array)+3; $i+=2){
    				if(isset($url_array[$i+1])){
    					$_GET[$url_array[$i]] = $url_array[$i+1];
    				}
    			}
    		}
    		$class = '\App\\'.$module.'\\Controller\\'.$controller;
	    	$object = new $class();

            $decorators = array();
            if( isset($this->config['controller'][$controller_low]['decorators']) ){
                $conf_decorator = $this->config['controller'][$controller_low]['decorators'];
                foreach($conf_decorator as $key =>$value){
                    $decorators[] = new $value;   
                }
            }
            foreach ($decorators as $key => $value) {
                $value->beforeRequest($object); 
            }
            $return_values = $object->$action();
	    	// call_user_func_array(array($object, $action), array());
            foreach($decorators as $key =>$value){
                $value->afterRequest($return_values); 
            } 


    	}
    	
    }


}