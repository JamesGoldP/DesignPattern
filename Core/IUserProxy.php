<?php
namespace Core;

interface IUserProxy
{
	public function getUserName($id);
	public function setUserName($id, $name);
}