<?php
namespace App\Index\Controller;

use Core\Factory;
use Core\Template;

class Index extends Template
{
	public function __construct()
	{
	}

	public function init()
	{
	 	$model = Factory::getModel('index');
	 	$this->assign('data', 'Hello World');
	 	$this->display('index');	
	}		
}