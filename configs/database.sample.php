<?php
$array =  array (
	'master' => array (
		'hostname' => 'localhost',
		'database' => 'temp',
		'username' => 'root',
		'password' => 'pyl',
		'tablepre' => 'cms_',
		'charset' => 'utf8',
		'type' => 'mysql',
		'debug' => true,
		'pconnect' => 0,
		'autoconnect' => 0,
		'params' => array(),
	),
	'slave' => array(
		'slave1' => array (
			'hostname' => 'localhost',
			'database' => 'temp',
			'username' => 'root',
			'password' => 'pyl',
			'tablepre' => 'cms_',
			'charset' => 'utf8',
			'type' => 'mysql',
			'debug' => true,
			'pconnect' => 0,
			'autoconnect' => 0,
			'params' => array(),
		),
		'slave2' => array (
			'hostname' => 'localhost',
			'database' => 'temp',
			'username' => 'root',
			'password' => 'pyl',
			'tablepre' => 'cms_',
			'charset' => 'utf8',
			'type' => 'mysql',
			'debug' => true,
			'pconnect' => 0,
			'autoconnect' => 0,
			'params' => array(),
		),
	)

);
return $array;