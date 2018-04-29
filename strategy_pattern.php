<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

class Page{

	public $strategy;  //策略类型

	public function index()
	{
	 	echo 'AD'.'<br/>';
	 	$this->strategy->showAD();
	 	echo '<br/>';

	 	echo 'Cateogry'.'<br/>';
	 	$this->strategy->showCategory();
	 	echo '<br/>';

	 	echo 'posid'.'<br/>';
	 	$this->strategy->showPosid();	
	}

	public function setStrategy($strategy)
	{
		$this->strategy = $strategy;
	}

}


$data = new Page();
$sex = isset($_GET['sex']) ? trim($_GET['sex']) : '';
if( $sex =='female' ){
	$strategy = new Core\FemaleUserStrategy();
} elseif( $sex == 'vip' ){
	$strategy = new Core\vipUserStrategy();
} else {
	$strategy = new Core\MaleUserStrategy();
}
$data->setStrategy($strategy);
$data->index();