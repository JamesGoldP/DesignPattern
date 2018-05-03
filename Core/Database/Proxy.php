<?php
namespace Core\Database;

use Core\Factory;

class Proxy{


 	public function query($sql)
 	{
 		if( substr($sql, 0, 6) == 'select' ){
 			echo '读操作'.'<br/>';
 			return Factory::getDatabase('slave')->query($sql);
 		} else {
 			echo '写操作'.'<br/>';
 			return Factory::getDatabase('master')->query($sql);
 		}	
 	}		


}