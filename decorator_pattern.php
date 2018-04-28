<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');


/**
 * 
 * 假设有一个需求：为画布增加颜色
 */
$canva1 = new Core\Canvas();
$canva1->init();
$canva1->addDecorator(new Core\ColorDecorator());
$canva1->addDecorator(new Core\SizeDecorator());
$canva1->rect(3, 6, 4, 12);
$canva1->draw();

