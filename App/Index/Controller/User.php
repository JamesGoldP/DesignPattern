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

    public function show()
    {
    	$db = Factory::getDatabase('proxy');	
    	$db->query('select * from user');
    	$db->query('update user set name = "Bob" where id=10 limit 1');
    }
	

}