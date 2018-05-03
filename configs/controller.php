<?php
$array = array(
	'index' => array(
		'decorators' => array(
			'App\Index\Decorator\Template',
			'App\Index\Decorator\Json',
		),
	)
);
return $array;