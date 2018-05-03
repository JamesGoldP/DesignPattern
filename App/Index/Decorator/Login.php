<?php
namespace App\Index\Decorator;

class Login
{

	public function beforeRequest($controller)
	{
		session_start();
		if( !isset($_SESSION['isLogin']) ){
			header('Location:/index/login/init');
		}
	}	

	public function afterRequest($returnValues)
	{
		
		
	}

}