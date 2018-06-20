<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Left extends Controller
{
    public function _initialize() {
	   	$diary= Db::name('diary') -> where('acco',1)->order('id desc')->limit(0,1) -> find();
		$article= Db::name('article') -> where('acco=1')->order('id desc')->limit(0,1) -> find();
		$task= Db::name('task') -> where('acco=1 and baifen=100')->order('id desc')->limit(0,1) -> find();
		$message= Db::name('message')->order('id desc')->limit(0,1) -> find();
		$comments= Db::name('comments')->order('id desc')->limit(0,1) -> find();
		$this->assign('diary',$diary);
		$this->assign('article',$article);
		$this->assign('task',$task);
		$this->assign('message1',$message);
		$this->assign('comments1',$comments);
	    //return $this->fetch();
    }
}
