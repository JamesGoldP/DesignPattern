<?php
namespace Core;

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


}