<?php
namespace Core;
use Core\Database\Mysqli;

class User
{
	public $id;
	public $name;
	public $mobile;
	public $regtime;

	protected $db;

	public function __construct($id)
	{
	 	$this->db = Factory::getDatabase();
	 	$sql = 'select * from user where id='.$id.' limit 1';
	 	$query = $this->db->query($sql);
	 	$result = mysqli_fetch_array($query);
	 	$this->id = $result['id'];
	 	$this->name = $result['name'];
	 	$this->mobile = $result['mobile'];
	 	$this->regtime = $result['regtime'];
	}

	public function __destruct()
	{
		$sql = 'update user set name=\''.$this->name.'\',mobile='.$this->mobile.',regtime='.$this->regtime.' where id='.$this->id.' limit 1';
		// echo $sql;
		// $this->db->query($sql);
			
	}

}