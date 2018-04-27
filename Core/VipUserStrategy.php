<?php
namespace Core;

class VipUserStrategy implements UserStrategy
{
	public function showAD()
	{
		echo 'VIP AD';
	}

	public function showCategory()
	{
		echo 'VIP category';
	}

	public function showPosid()
	{
		echo 'VIP Posid';
	}
}