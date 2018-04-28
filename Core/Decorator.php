<?php
namespace Core;

interface Decorator
{
	public function beforeDraw();
	public function afterDraw();
}