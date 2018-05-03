<?php
namespace App\Index\Controller;

use Core\Controller;


class Index extends Controller
{

	public function init()
	{
	 	// $model = Factory::getModel('index');
	 	// $this->assign('data', 'Hello World');
	 	// $this->display('index');
	 	return array('code'=>1,'result'=>'success', 'data'=>array('content'=>'Hello World'));	
	}


}