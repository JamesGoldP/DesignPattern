<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

$users = new Core\AllUser();
foreach ($users as $key => $value) {
	print_r($value->name);
}