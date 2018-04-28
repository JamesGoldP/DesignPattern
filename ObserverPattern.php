<?php
define('BASEDIR', __DIR__);
//载入Loader
include_once BASEDIR.'/Core/Loader.php';
spl_autoload_register('\\Core\\Loader::_autoload');

class Event extends Core\EventGenerator
{
	//具体被观察者业务 发布一条信息，并通知所有客户端
	public function trigger()
	{
		echo '今天天气很好，我们发布了更新包'.'<br/>';
		$this->notify();
	}

}

//web端
class Observer1 implements Core\Observer
{
	public function update($event_info = null)
	{
		echo '通知已接收，web端更新完毕<br/>';
	}	

}

//微信端
class Observer2 implements Core\Observer
{
	public function update($event_info = null)
	{
		echo '通知已接收，微信端更新完毕<br/>';
	}	

}

$Event = new Event();
$Event->addObserver(new Observer1());
$Event->addObserver(new Observer2());
$Event -> trigger();
