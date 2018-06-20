<?php
namespace app\admin20161108\controller;
use think\Controller;
use app\admin20161108\model\Task as TaskModel;

class Task extends Sessionlogin
{
	public function index(){
		$val = TaskModel::order('baifen asc , id desc')->paginate(10);
		$result = new TaskModel;
		$num = $result -> number();
		$this->assign('empty','<div><span class="text-danger">没有找到您要的数据</span></div>');
		$this ->assign('num',$num);
		$this -> assign('list', $val);
		return $this -> fetch();
	}
	
	public function dele(){
		$id = input('post.id');
		$result = new TaskModel;
		$val = $result -> del($id);
		if ($val > 0) {
			$this -> success('删除成功！^_^', './admin20161108/task', 1);
		} else {
			$this -> error('删除失败！⊙︿⊙', 0, 0);
		}
	}
	
	//点击隐藏/显示
	public function show() {
		$id = input('post.id');
		$result = new TaskModel;
		$val = $result -> Show($id);
		//dump($val);
		if ($val > 0) {
			$this -> success('修改成功！^_^', './admin20161108/task', 1);
		} else {
			$this -> error('修改失败！⊙︿⊙', 0, 0);
		}
	}
	
	//点击隐藏/显示
	public function state() {
		$id = input('post.id');
		$result = new TaskModel;
		$val = $result -> state($id);
		//dump($val);
		if ($val > 0) {
			$this -> success('修改成功！^_^', './admin20161108/task', 1);
		} else {
			$this -> error('修改失败！⊙︿⊙', 0, 0);
		}
	}
	
	//搜索
	public function search(){
		$content =trim(input('post.content'));
		$result = new TaskModel;
		$val = $result ->search($content);
		$num = count($val);
		$this ->assign('num',$num);
		$this->assign('empty','<div><span class="text-danger">没有找到您要的数据</span></div>');
		$this -> assign('list',$val);
		return $this->fetch('index');
	}
	
	//排序
	public function sorting($type){
		//echo $type.$deac;die;
		
		switch ($type)
		{
			case 'state':
				$val = TaskModel::order('state','desc')->paginate(10);
				$result = new TaskModel;
				$num = $result -> number();
				$this ->assign('num',$num);
				$this -> assign('list',$val);
				return $this->fetch('index');
				break;
			case 'baifen':
				$val = TaskModel::order('baifen','asc')->paginate(10);
				$result = new TaskModel;
				$num = $result -> number();
				$this ->assign('num',$num);
				$this -> assign('list',$val);
				return $this->fetch('index');
				break;
			case 'sorting':
				$val = TaskModel::order('sorting','desc')->paginate(10);
				$result = new TaskModel;
				$num = $result -> number();
				$this ->assign('num',$num);
				$this -> assign('list',$val);
				return $this->fetch('index');
				break;
		}
	}
}
