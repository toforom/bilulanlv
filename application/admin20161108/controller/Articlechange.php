<?php
namespace app\admin20161108\controller;
use think\controller;
use app\admin20161108\model\Article as ArticleModel;
use app\admin20161108\model\Lists as ListsModel;

class Articlechange extends Sessionlogin {
	public function index($id) {
		$result = new ArticleModel;
		$val = $result -> editlist($id);
		$res = new ListsModel;
		$lb = $res -> liebiao();
		$this -> assign('lb',$lb);
		$this -> assign('list',$val);
		return $this -> fetch();
	}

	public function edit() {
		//dump(input('post.'));die;
		$data = input('post.');
		$result = new ArticleModel;
		$val = $result -> edit($data);
		if ($val > 0) {
			$this -> success('修改成功', 'history.go(0);', 1);
		} else {
			$this -> error('修改失败', 0, 0);
		}
	}

}
