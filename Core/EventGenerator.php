<?php
namespace Core;

abstract class EventGenerator
{
	private $observers = array();

	public function addObserver($observer)
	{
		$this->observers[] = $observer;
	}

	public function notify()
	{
		foreach ($this->observers as $value) {
			$value->update();	
		}	
	}

}