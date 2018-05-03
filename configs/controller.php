<?php
$array = array(
	'index' => array(
		'decorators' => array(
				'App\Index\Decorator\Template',
				'App\Index\Decorator\Json',
				'App\Index\Decorator\Login',
			),
		),
	'login' => array(
		'decorators' => array(
				'App\Index\Decorator\Template',
			),
		)

	);
return $array;