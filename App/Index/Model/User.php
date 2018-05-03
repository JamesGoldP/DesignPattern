<?php
namespace App\Index\Model;

use Core\Model;

class User extends Model
{

	public function create($user)
	{
		$this->notify($user);
	}

}