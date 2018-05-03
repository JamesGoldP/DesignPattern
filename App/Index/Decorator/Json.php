<?php
namespace App\Index\Decorator;

class Json
{


	public function beforeRequest($controller)
	{
	}	

	public function afterRequest($returnValues)
	{
		if( isset($_GET['app']) && $_GET['app'] == 'json' ){
			echo json_encode($returnValues);
		}
		
	}

}