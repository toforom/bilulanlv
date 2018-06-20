<?php
namespace app\admin20161108\controller;
use think\Controller;
use app\admin20161108\model\Article as ArticleModel;

class Article extends Sessionlogin
{
	public function index(){
		$val = ArticleModel::order('id','desc')->paginate(10);
		$result = new ArticleModel;
		$num = $result -> number();
		$this ->assign('num',$num);
		$this -> assign('list', $val);
		return $this -> fetch();
	}
	
	//点击隐藏/显示
	public function Show() {
		$id = input('post.id');
		$result = new ArticleModel;
		$val = $result -> Show($id);
		//dump($val);
		if ($val > 0) {
			$this -> success('修改成功！^_^', './admin20161108/diary', 1);
		} else {
			$this -> error('修改失败⊙︿⊙', 0, 0);
		}
	}
	
	//删除
	public function Dele(){
		$id = input('post.id');
		$result = new ArticleModel;
		$val = $result -> del($id);
		if ($val > 0) {
			$this -> success('删除成功！^_^', './admin20161108/article', 1);
		} else {
			$this -> error('删除失败！⊙︿⊙', 0, 0);
		}
	}
	
	//搜索
	public function So(){
		$data = input('post.');
		$result = new ArticleModel;
		$val = $result ->so($data);
		$num = count($val);
		$this ->assign('num',$num);
		$this->assign('empty','<div><span class="text-danger">没有找到您要的数据</span></div>');
		$this -> assign('list',$val);
		return $this->fetch('index');
	}
	
}
