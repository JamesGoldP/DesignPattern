<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

$user = new Core\User(1);
// var_dump($user->id.$user->name.$user->mobile.$user->regtime);
$user->id = 20;
$user->name = 'Nezumi';
$user->mobile = '18922322234';
$user->regtime = time();