<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

class Page
{
	public function index()
	{
		$user = Core\Factory::getUser(8);
		//var_dump($user->id.$user->name.$user->mobile.$user->regtime);
		$user->name = 'Nezumi5';
		$this->test();
	}

	public function test()
	{
		$user = Core\Factory::getUser(8);
		$user->mobile = '18922322235';	
	}
}

$data = new Page();
$data->index();
