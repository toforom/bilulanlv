<?php
namespace app\admin20161108\controller;
use think\Controller;
use app\admin20161108\model\Comments as CommentsModel;

class Articlecomment extends Sessionlogin
{
	public function index(){
		$result = new CommentsModel;
		$val = $result -> articlelist();
		$num = $result -> numberarticle();
		$MenArticleList = $result -> MenArticleList();
		$this ->assign('MenArticleList',$MenArticleList);
		$this ->assign('num',$num);
		$this -> assign('list',$val);
		$this -> assign('empty','<div><span class="text-danger">没有找到您要的数据</span></div>');
		return $this -> fetch();
	}
	
	public function del(){
		$data = input('post.');
		//以逗号为分割点分割
		$dataval = explode(',', input('post.idval'));
		$data['idd'] =$dataval[0];
		$parent = $dataval[1];
		
		$data['type'] = 2;
		unset($data['idval']);
		$result = new CommentsModel;
		$val = $result -> del($data);
		if ($val > 0){
			$result -> DecContent($parent);
			$this -> success('删除成功！^_^',1,1);
		}else{
			$this -> error('删除失败！⊙︿⊙',0,0);
		}
	}
	
	public function recontent(){
		//dump(input('post.'));die;
		$id = input('post.id');
		$content = input('post.re_content');
		$data = explode(',', input('post.data'));
		$email =$data[0];
		$name = $data[1];
		$result = new CommentsModel;
		$val = $result -> recontent($id,$content);
		if ($val > 0){
			if ($email){
				$mailval = $result ->mailcomments(2,$id);
				$result = new Mail();
				$result -> sendmail(2,$mailval);
			}
			$this -> success('回复成功！^_^',1,1);
		}else{
			$this -> error('回复失败！⊙︿⊙',0,0);
		}
	}
	
	public function search(){
		$search = trim(input('post.content'));
		$result = new CommentsModel;
		$val = $result -> searcharticle($search);
		$num = $result -> numberarticle();
		$num = count($val);
		$this ->assign('num',$num);
		$this -> assign('empty','<div><span class="text-danger">没有找到您要的数据</span></div>');
		$this -> assign('list',$val);
		return $this -> fetch('index');
	}
	
	
	
}//结束
