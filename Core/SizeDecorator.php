<?php
namespace Core;

class SizeDecorator implements Decorator
{

	protected $size = null;

	public function __construct($size = '14px')
	{
		$this->size = $size;
	}

	public function beforeDraw()
	{
		echo '<div style="font-size:'.$this->size.'">';
	}

	public function afterDraw()
	{
		echo '</div>';
	}
}