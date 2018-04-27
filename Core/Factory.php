<?php
namespace Core;

class Factory{

    public static function createDatabase()
    {
    	$db = new Database();
    	return $db;			
    }

}