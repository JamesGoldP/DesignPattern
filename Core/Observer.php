<?php
namespace Core;

interface  Observer
{
	public function update($event_info = null);
}