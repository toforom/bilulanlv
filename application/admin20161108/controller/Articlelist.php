<?php
namespace app\admin20161108\controller;
use think\Controller;
use app\admin20161108\model\Lists as ListsModel;

class Articlelist extends Sessionlogin
{
	public function index(){
		$result = new ListsModel;
		$val = $result -> liebiao();
		$this -> assign('list',$val);
		return $this->fetch();
	}
	
	public function add(){
		$data = input('post.');
		$data['add_time']=time();
		$result = new ListsModel;
		$val = $result -> add($data);
		if ($val > 0) {
			$this -> success('添加分类成功！^_^', 1, 1);
		} else {
			$this -> error('添加分类失败！⊙︿⊙', 0, 0);
		}
	}
	
	public function del(){
		$id = input('post.id');
		$result = new ListsModel;
		$val = $result -> del($id);
		if ($val > 0) {
			$this -> success('删除成功！^_^', './admin20161108/diary', 1);
		} else {
			$this -> error('删除失败！⊙︿⊙', 0, 0);
		}
	}
}
