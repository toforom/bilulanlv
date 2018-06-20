<?php
namespace app\admin20161108\controller;
use think\Session;
use think\Controller;

class Sessionlogin extends controller
{
    public function _initialize(){
    	$session=Session::get('useradmin');
		if(!isset($session)){
			$this->redirect(url('./admin20161108/login'));
		}
    }
}
