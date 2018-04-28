<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

$prototype = new Core\Canvas();
$prototype->init();

$canva1 = clone $prototype;
$canva1->rect(3, 6, 4, 12);
$canva1->draw();

echo '<hr/>';

$canva2 = clone $prototype;
$canva2->rect(3, 6, 4, 12);
$canva2->draw();


echo '<hr/>';

$canva3 = clone $prototype;
$canva3->rect(3, 6, 4, 12);
$canva3->draw();