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

	public function __construct()
	{
	 	$this->db = new Mysqli();
		$config = array (
			'default' => array (
				'hostname' => 'localhost',
				'database' => 'temp',
				'username' => 'root',
				'password' => 'pyl',
			),
		);
	 	$this->db->connect($config['default']);
	 	$query = $this->db->query('select * from user limit 1');
	 	$result = mysqli_fetch_array($query);
	 	$this->id = $result['id'];
	 	$this->name = $result['name'];
	 	$this->mobile = $result['mobile'];
	 	$this->regtime = $result['regtime'];
	}

	public function __destruct()
	{
		$sql = 'update user set id='.$this->id.',name=\''.$this->name.'\',mobile='.$this->mobile.',regtime='.$this->regtime.' limit 1';
		$this->db->query($sql);
			
	}

}