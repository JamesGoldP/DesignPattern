<?php
namespace App\Index\Controller;

use Core\Controller;
use Core\Factory;


class User extends Controller
{

	public function init()
	{
					
	}

	public function add()
	{
		$user = 1;
		$model = Factory::getModel('User');
		$model->create($user);
	}
	

}