<?php
namespace Core\Database;

use Core\IDatabase;

class MySql implements IDatabase{

	private $link;   //数据库连接资源

	public function connect($config)
	{
        $this->link = mysql_connect($config['hostname'], $config['username'], $config['password']);
        mysql_select_db($config['database']);
        return $this->link; 
	} 

	public function query($sql)
	{
		return mysql_query($sql, $this->link);
	}

	public function close()
	{
		mysql_close($this->link);
	}

}