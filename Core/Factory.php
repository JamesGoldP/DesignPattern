<?php
namespace Core;

class Factory{

    public static function createDatabase()
    {
    	$db = Database::getInstance();
    	return $db;			
    }

}