<?php
namespace app\admin20161108\model;
use think\Model;
use think\Db;

class Log extends Model
{
	//修改状态添加效果
	public function getStateAttr($value){
		 $status = [0=>'<span class="label">失败</span>',1=>'<span class="label label-primary">成功</span>'];
         return $status[$value];
	}
	public function getTypeAttr($value){
		 $status = [1=>'<span class="label label-success">日志</span>',2=>'<span class="label label-warning">文章</span>',3=>'<span class="label label-danger">留言</span>'];
         return $status[$value];
	}
	
	//添加log
	public function add($data){
		$result = Db::name('log')->insert($data);
	}
	
	//数量
	public function number(){
		$result = Db::name('log')->count();
		return $result;
	}
	
	//全部显示
	public function loglist(){
		$result = Db::name('log')->order('id','desc')->paginate(10);
		return $result;
	}
	//删除
	public function del($id){
		$result = Db::name('log')->where('id',$id)->delete();
		return $result;
	}
}