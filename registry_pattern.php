<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

# 对于很多地方的new，可以挂在全局树上
$db1 = \Core\Factory::createDatabase();
$db2 = Core\Register::get('db1');
var_dump($db);
var_dump($db2);