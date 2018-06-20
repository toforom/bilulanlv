<?php
namespace app\admin20161108\controller;
use think\Controller;
use app\admin20161108\model\Task as TaskModel;

class Taskadd extends Sessionlogin
{
	public function index(){
		return $this -> fetch();
	}
	
	public function add(){
		$data = input('post.');
		//对需要提交的数据进行添加整合
		$data['add_time']=time();
		//对提交的数据过滤
		$result = $this ->validate($data,'Taskadd');
		if ($result !== true){
			$this -> error($result, 0, 0);
			return;
		}//验证结束
		$result = new TaskModel;
		$val = $result -> add($data);
		if ($val > 0){
			$this -> success('任务添加成功！^_^','./admin20161108/task');
		}else{
			$this -> error('添加任务失败！⊙︿⊙',0,0);
		}
	}
}
