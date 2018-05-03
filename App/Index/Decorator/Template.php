<?php
namespace App\Index\Decorator;

class Template
{

	private $controller;  //object

	public  function beforeRequest($controller)
	{
		$this->controller = $controller;
	}	

	public function afterRequest($returnValues)
	{
		if(  !isset($_GET['app']) || $_GET['app'] =='html' ){
			if( !empty($returnvalues) ){
				foreach ($returnValues as $key => $value) {
					$this->controller->assign($key, $value);	
				}
			}
			$this->controller->display();
		}
	}

}