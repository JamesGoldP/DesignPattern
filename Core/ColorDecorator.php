<?php
namespace Core;

class ColorDecorator implements Decorator
{

	protected $color = null;

	public function __construct($color = 'red')
	{
		$this->color = $color;
	}

	public function beforeDraw()
	{
		echo '<div style="color:'.$this->color.'">';
	}

	public function afterDraw()
	{
		echo '</div>';
	}
}