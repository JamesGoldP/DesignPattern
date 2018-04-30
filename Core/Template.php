<?php
namespace Core;

class Template
{

	protected $assign = array(); //模板文件所所分配的数组

	public function assign($key, $value)
	{
		$this->assign[$key] = $value;	
	}

	public function display($file = '')
	{
		
		$path = BASEDIR.'/App/'.ROUTE_M.'/View/';
		$path = str_replace('/', DIRECTORY_SEPARATOR, $path);
		if( empty($file) ){	
			$file = ROUTE_A;
		}
		$file = $path.$file.'.php';
		extract($this->assign);
		if( file_exists($file) ){
			include $file;
		} 
		
	}

}