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
        //获取默认route配置
    	$route_conf = $this->config['route']['default'];
    	if( isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO']!='/' ){
    		$url = trim($url, '/'); //去掉左右两边的/
    		$url_array = explode('/', $url);

            //获取模块
    		$module = !empty($url_array[0])  ? ucwords(array_shift($url_array)) : $route_conf['module'];
            define('ROUTE_M', $module);

            //获取控制器
    		$controller = !empty($url_array[0])  ? ucwords(array_shift($url_array)) : $route_conf['controller'];
            define('ROUTE_C', $controller);

            //获取方法
    		$action = !empty($url_array[0])  ? strtolower(array_shift($url_array)) : $route_conf['action'];
            define('ROUTE_A', $action);

            $controller_low = strtolower($controller);


    		//处理后面的参数
    		if( !empty($url_array) ){
    			for($i=0; $i<count($url_array); $i+=2){
    				if(isset($url_array[$i+1])){
    					$_GET[$url_array[$i]] = $url_array[$i+1];
    				}
    			}
    		}

    		$class = '\App\\'.$module.'\\Controller\\'.$controller;
	    	$object = new $class($module, $controller, $action);

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