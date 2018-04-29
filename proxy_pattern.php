<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

$proxy = new Core\UserProxy();
$proxy->setUsername('8', 'James');
$proxy->getUsername('8');