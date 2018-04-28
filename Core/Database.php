<?php
namespace Core; 

class Database{

	static  $db;

	private function __construct()
	{
		echo 'run here!';	
	}

	public static function getInstance()
	{
		if( !self::$db ){
			self::$db = new self();
		} 
		return self::$db;

	}

}