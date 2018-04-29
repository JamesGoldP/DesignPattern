<?php
namespace Core;

class Config implements \ArrayAccess
{

	private $path;//配置路径
	protected $configs = array();  //数组

	public function __construct($path)
	{
		$this->path = $path;
	}

	/**
	 * 检查数组是否存在
	 * @var type
	 */
	public function  offsetExists ( $offset )
	{
		return isset($this->config[$offset]);
	}

	/**
	 * 获取数组
	 * @var type
	 */	
	public function offsetGet ( $offset )
	{
		if(empty($this->configs[$offset])){
			$file = $this->path.DIRECTORY_SEPARATOR.$offset.'.php';
			if( file_exists($file) ){
				$config = require_once($file);
				$this->configs[$offset] = $config;
			}
		}
		return $this->configs[$offset];
	}

	/**
	 * 设置数组
	 * @var type
	 */
	public function offsetSet ( $offset , $value )
	{

	}

	/**
	 * 删除数组
	 * @var type
	 */
	public function  offsetUnset ( $offset )
	{
		unset($this->configs[$offset]);
	}
}