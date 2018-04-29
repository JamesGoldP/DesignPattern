<?php
namespace Core;

class Register{

	protected static $objects;

	/*	
	 *  注册到全局树中
	 *
	 */
	public static function set($alias , $object)
	{
		self::$objects[$alias] = $object;
	}

	/*	
	 *  获取全局树的类
	 *
	 */
	public static function get($key)
	{
		if (!isset(self::$objects[$key]))
        {
            return false;
        }
		return self::$objects[$key];
	}	


	/*	
	 *  取消全局树中的类
	 *
	 */
	public static function _unset()
	{
		unset(self::$objects[$alias]);	
	}	
}