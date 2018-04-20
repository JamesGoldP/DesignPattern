<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('Core\Loader::_autoload');

Core\Object::test();
App\Controller\Home\Index::test();