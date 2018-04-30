<?php
namespace Core;

use Core\Database\Mysqli;

class Factory{

    public static function createDatabase()
    {
    	$db = Database::getInstance();
    	Register::set('db1', $db);
    	return $db;			
    }

    public static function getUser($id)
    {
    	$key = 'user_'.$id;
    	$user = Register::get($key);
    	if( !$user ){
    		$user = new user($id);
    		Register::set($key, $user);
    	}
        return $user;	
    }

    public static function getDatabase( $id = 'master' )
    {
        $key = 'database_'.$id;
        if( $id == 'master' ){
            $db_config = Application::getInstance()->config['database']['master'];
        } else {
            $db_configs  = Application::getInstance()->config['database']['slave'];
            $db_config = $db_configs[array_rand($db_configs)];
        }
        $db = Register::get($key);
        if( !$db ){
            $db = new MySqli();
            $db->connect($db_config);
            Register::set($key, $db);
        }
        return $db;
    }

    static function getModel($name)
    {
       $key = 'app_model_'.$name;
       $model = Register::get($key);
       if(!$model){
            $class = '\App\\'.ROUTE_M.'\\'.'Model\\'.$name;
            $model = new $class();
            Register::set($key, $model);
       }
       return $model;
       
    }


}