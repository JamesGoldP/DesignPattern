<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

$config = array (
	'default' => array (
		'hostname' => '127.0.0.1',
		'database' => 'mycms',
		'username' => 'root',
		'password' => 'pyl',
	),
);

$db = new Core\Database\MySqli();
$link = $db->connect($config['default']);
$mysqli_result = $db->query('show databases');
$result = mysqli_fetch_array($mysqli_result, MYSQLI_ASSOC);
print_r($result);
$db->close();