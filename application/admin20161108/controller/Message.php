<?php
namespace app\admin20161108\controller;
use think\Controller;
use app\admin20161108\model\Message as MessageModel;

class Message extends Sessionlogin
{
	public function index(){
		$result = new MessageModel;
		$val = $result -> messagelist();
		$num = $result -> number();
		$this ->assign('num',$num);
		$this -> assign('list',$val);
		$this -> assign('empty','<div><span class="text-danger">没有找到您要的数据</span></div>');
		return $this -> fetch();
	}
	
	public function del(){
		$id = input('post.id');
		$result = new MessageModel;
		$val = $result -> del($id);
		if ($val > 0){
			$this -> success('删除成功！^_^',1,1);
		}else{
			$this -> error('删除失败！⊙︿⊙',0,0);
		}
	}
	
	public function recontent(){
		//dump(input('post.'));die;
		$data['id'] = input('post.id');
		$data['re_time'] = time();
		$data['re_content'] = input('post.re_content');
		$redata = explode(',', input('post.data'));
		$email =$redata[0];
		$name = $redata[1];
		$result = new MessageModel;
		$val = $result -> recontent($data);
		if ($val > 0){
			if ($email){
				$mailval = $result ->mailmessage($data['id']);
				$mailval['type'] = 3;
				$result = new Mail();
				$result -> sendmail(3,$mailval);
			}
			$this -> success('回复成功！^_^',1,1);
		}else{
			$this -> error('回复失败！⊙︿⊙',0,0);
		}
	}
	
	public function search(){
		$search = trim(input('post.content'));
		$result = new MessageModel;
		$val = $result -> search($search);
		$num = $result -> number();
		$num = count($val);
		$this ->assign('num',$num);
		$this -> assign('empty','<div><span class="text-danger">没有找到您要的数据</span></div>');
		$this -> assign('list',$val);
		return $this -> fetch('index');
	}
	
	
	
}//结束
