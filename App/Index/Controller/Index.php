<?php
namespace App\Index\Controller;

use Core\Factory;

class Index
{
	public function __construct()
	{
	}

	public function init()
	{
	 	$model = Factory::getModel('index');	
	}		
}