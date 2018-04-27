<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');


class Page{

	public $strategy;  //策略类型

	public function index()
	{
		$femaleClass = new Core\FemaleUserStrategy();
		$maleClass = new Core\maleUserStrategy();
		$vipClass = new Core\vipUserStrategy();
		
		echo 'AD'.'<br/>';
	 	$sex = isset($_GET['sex']) ? trim($_GET['sex']) : '';
		if( $sex =='female' ){		
			$femaleClass->showAD();
		} else if( $sex == 'vip' ){
			$vipClass->showAD();
		} else {
			$maleClass->showAD();
		}

		echo '<br/>';
		echo 'Cateogry'.'<br/>';
		if( $sex =='female' ){		
			$femaleClass->showCategory();
		} else if( $sex == 'vip' ){
			$vipClass->showCategory();
		} else {
			$maleClass->showCategory();
		}

		echo 'posid'.'<br/>';
		if( $sex =='female' ){		
			$femaleClass->showPosid();
		} else if( $sex == 'vip' ){
			$vipClass->showPosid();
		} else {
			$maleClass->showPosid();
		}


	}


}


$data = new Page();
$sex = isset($_GET['sex']) ? trim($_GET['sex']) : '';
$data->index();