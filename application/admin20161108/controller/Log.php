<?php
namespace app\admin20161108\controller;
use think\Controller;
use app\admin20161108\model\Log as LogModel;

class Log extends Sessionlogin
{
    public function index()
    {
    	$val = LogModel::order('id','desc')->paginate(10);
    	$result = new LogModel;
		$num = $result -> number();
		$this ->assign('num',$num);
		$this -> assign('list',$val);
		$this -> assign('empty','<div><span class="text-danger">没有找到您要的数据</span></div>');
		return $this -> fetch();
    }
	
	public function del(){
		$id = input('post.id');
		$result = new LogModel;
		$val = $result -> del($id);
		if ($val > 0) {
			$this -> success('删除成功！^_^', './admin20161108/log', 1);
		} else {
			$this -> error('删除失败！⊙︿⊙', 0, 0);
		}
	}
	
	//搜索
	public function search(){
		$data = input('post.content');
		$val = LogModel::where('title','like','%'.$data.'%')->paginate(10);
		$num = count($val);
		$this ->assign('num',$num);
		$this->assign('empty','<div><span class="text-danger">没有找到您要的数据</span></div>');
		$this -> assign('list',$val);
		return $this->fetch('index');
	}
}
