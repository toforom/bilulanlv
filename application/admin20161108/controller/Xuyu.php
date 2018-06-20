<?php
namespace app\admin20161108\controller;
use think\Controller;
use think\Db;
use app\admin20161108\model\Xuyu as XuyuModel;

class Xuyu extends Sessionlogin
{
    public function index()
    {
    	$result = new XuyuModel;
		$val = $result ->XuyuList();
		$this -> assign('xuyu',$val);
    	return $this->fetch();
    }
}
