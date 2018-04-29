<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

$config = Core\Application::getInstance(BASEDIR.DIRECTORY_SEPARATOR.'configs')->config['database']['master'];
// print_r($config);