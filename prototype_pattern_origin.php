<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

$canva = new Core\Canvas();
$canva->init();
$canva->rect(3, 6, 4, 12);
$canva->draw();

echo '<hr/>';

$canva = new Core\Canvas();
$canva->init();
$canva->rect(3, 6, 4, 10);
$canva->draw();