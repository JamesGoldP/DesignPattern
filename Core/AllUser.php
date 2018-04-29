<?php
namespace Core;

class AllUser implements \Iterator
{

	public $index;  //相当于for 的$i
	public $ids = array();

	public function __construct()
	{
        $db = Factory::getDatabase();
        $result = $db->query('select id from user');	
        $this->ids = $result->fetch_all(MYSQLI_ASSOC);
	}

	/**
	 * 获取当前元素
	 * 
	 */
	public function current()
	{
		$id = $this->ids[$this->index]['id'];
		return Factory::getUser($id);
	}	

	/**
	 * 获取下一个元素 
	 * 
	 */
	public function next()
	{
		$this->index++;
	}	

	/**
	 * 验证当前是否还有下一个元素
	 * 
	 */
	public function valid()
	{
		return $this->index < count($this->ids);
	}	


	/**
	 * 1.重置，回到整个集合的开头
	 * 
	 */
	public function rewind()
	{
		$this->index = 0;
	}	



	/**
	 * 获取key
	 * 
	 */
	public function key()
	{
		return $this->index;
	}	




}