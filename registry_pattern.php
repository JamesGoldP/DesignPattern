<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

// $db = Core\Database::getInstance();
$db = \Core\Factory::createDatabase();

$db2 = Core\Register::get('db1');
var_dump($db);
var_dump($db2);