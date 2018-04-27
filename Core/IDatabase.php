<?php
namespace Core; 

interface IDatabase
{
	public function connect($config);
	public function query($sql);
	public function close();
}
