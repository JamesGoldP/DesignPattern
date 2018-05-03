<?php
namespace App\Index\Controller;

use Core\Controller;
use Core\Template;


class Index extends Controller
{
	public function __construct()
	{
	}

	public function init()
	{
	 	// $model = Factory::getModel('index');
	 	// $this->assign('data', 'Hello World');
	 	// $this->display('index');
	 	return array('code'=>1,'result'=>'success', 'data'=>array('content'=>'Hello World'));	
	}		
}