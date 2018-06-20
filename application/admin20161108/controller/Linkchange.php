<?php
namespace app\admin20161108\controller;
use thknk\Controller;
use app\admin20161108\model\Link as LinkModel;

class Linkchange extends Sessionlogin
{
	public function index($id){
		$result = new LinkModel;
		$val = $result -> editlist($id);
		$this -> assign('list',$val);
		return $this -> fetch();
	}
	
	public function edit() {
		//dump(input('post.'));die;
		$data = input('post.');
		$result = new LinkModel;
		$val = $result -> edit($data);
		if ($val > 0) {
			$this -> success('修改成功！^_^', 'history.go(0);', 1);
		} else {
			$this -> error('修改失败！⊙︿⊙', 0, 0);
		}
	}
	
}
