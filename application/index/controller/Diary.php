<?php
namespace app\index\controller;
use think\Controller;
use app\admin20161108\model\Diary as DiaryModel;

class Diary extends Left
{
    public function index()
    {
    	$result = new DiaryModel;
		$val = $result ->showdiary();
		$this -> assign('list',$val);
		//dump($val);
		return $this->fetch();
    }
}
