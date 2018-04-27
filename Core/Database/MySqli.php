<?php
namespace Core\Database;

use Core\IDatabase;

class MySqli implements IDatabase{

    private $link;   //数据库连接资源

    public function connect($config)
    {
        $this->link = mysqli_connect($config['hostname'], $config['username'], $config['password'], $config['database']);
        return $this->link; 
    } 

    public function query($sql)
    {
        return mysqli_query($this->link, $sql);
    }

    public function close()
    {
        mysqli_close($this->link);
    }

}