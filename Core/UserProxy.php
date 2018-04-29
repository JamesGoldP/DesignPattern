<?php
namespace Core;


class UserProxy implements IUserProxy
{
	public function getUserName($id)
	{
		$db = Factory::getDatabase('slave');
		$db->query('select * from User  where id = '.$id.' limit 1');
	}

	public function setUserName($id, $name)
	{
		$db = Factory::getDatabase('master');
		$db->query('UPDATE User set name = \''.$name.'\' where id = '.$id.' limit 1');
	}

}