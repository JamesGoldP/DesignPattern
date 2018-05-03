<?php
namespace Core;

class Model{

	protected $observers = array();

	public function __construct()
	{
		$array = explode('\\', get_class($this));
		$name =  strtolower(array_pop($array));
		if( !empty($observers = Application::getInstance()->config['model'][$name]['observer']) ) {
			foreach ($observers as $key => $value) {
				$this->observers[] = new $value;
			}	
		}
	}

	protected function notify($user)
	{
		foreach ($this->observers as $key => $value) {
			 $value->update($user);
		}			
	}
}