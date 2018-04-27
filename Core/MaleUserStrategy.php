<?php
namespace Core;

class MaleUserStrategy implements UserStrategy
{
	public function showAD()
	{
		echo 'Male AD';
	}

	public function showCategory()
	{
		echo 'Male category';
	}

	public function showPosid()
	{
		echo 'Male Posid';
	}
}