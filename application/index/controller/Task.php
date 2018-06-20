<?php
namespace app\index\controller;
use think\Controller;
use app\admin20161108\model\Task as TaskModel;

class Task extends Left
{
    public function index()
    {
    	$result = new TaskModel;
		$val = $result ->showtask();
		$this -> assign('list',$val);
        return $this->fetch();
    }
}
