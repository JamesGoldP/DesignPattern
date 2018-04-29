<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

$db = Core\Factory::getDatabase('master');
$db->query('UPDATE User set name ="Bob2" where id = 10 limit 1');


$db = Core\Factory::getDatabase('slave');
$db->query('select * from User  where id = 10 limit 1');
