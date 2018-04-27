<?php
namespace Core;

class FemaleUserStrategy implements UserStrategy
{
	public function showAD()
	{
		echo 'Female AD';
	}

	public function showCategory()
	{
		echo 'Female category';
	}

	public function showPosid()
	{
		echo 'Female Posid';
	}
}