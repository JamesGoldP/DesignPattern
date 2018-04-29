<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

$db = Core\Factory::getDatabase();
// var_dump($db);
var_dump(Core\Register::get('database_master'));