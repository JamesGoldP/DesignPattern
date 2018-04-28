<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

class Canva2 extends Core\Canvas
{
	function draw()
	{
		echo '<div style="color:blue;">';
		parent::draw();
		echo '</div>';
	}
}

/**
 * 
 * 假设有一个需求：为画布增加颜色
 */
$canva = new Canva2();
$canva->init();
$canva->rect(3, 6, 4, 12);
$canva->draw();

