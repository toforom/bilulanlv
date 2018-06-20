<?php
namespace app\admin20161108\model;
use think\Model;
use think\Db;

class Task extends Model
{
	
	//修改状态添加效果
	public function getAccoAttr($value){
		 $status = [0=>'<span class="label">隐藏</span>',1=>'<span class="label label-primary">显示</span>'];
         return $status[$value];
	}
	
	//修改状态添加效果
	public function getStateAttr($value){
		 $status = [1=>'<span class="label label-success">正常</span>',2=>'<span class="label label-danger">紧急</span>'];
         return $status[$value];
	}
	
	//修改显示
	public function editlist($id) {
		$result = Db::name('task')->where('id',$id)->select();
		return $result;
	}
	
	//添加
	public function add($data){
		$result = Db::name('task')->insert($data);
		return $result;
	}
	
	//列表
	public function tasklist(){
		$result = Db::name('task')->order('baifen asc , id desc') -> paginate(10);
		return $result;
	}
	
	//修改
	public function edit($data){
		$result = Db::name('task')->where('id',$data['id'])->update($data);
		return $result;
	}
	
	//删除
	public function del($id){
		$result = Db::name('task')->where('id',$id)->delete();
		return $result;
	}
	
	//搜索
	public function search($content){
		$result = Db::name('task')->where('title','like','%'.$content.'%')->paginate(10);
		return $result;
	}
	
	//统计数量
	public function number(){
		$result = Db::name('task')->count();
		return $result;
	}
	
	//点击隐藏/显示
	public function Show($id){
		$result = Db::name('task')->where('id',$id)->value('acco');
		if($result > 0){
			$val = Db::name('task')->where('id',$id)->setField('acco',0);
			if ($val > 0){
				return 1;
			}
		}elseif($result <= 0){
			$val = Db::name('task')->where('id',$id)->setField('acco',1);
			if ($val > 0){
				return 2;
			}
		}
	}
	
	//点击状态修改
	public function state($id){
		$result = Db::name('task')->where('id',$id)->value('state');
		if($result == 1){
			$val = Db::name('task')->where('id',$id)->setField('state',2);
			if ($val > 0){
				return 1;
			}
		}elseif($result == 2){
			$val = Db::name('task')->where('id',$id)->setField('state',1);
			if ($val > 0){
				return 2;
			}
		}
	}
	
	/*
	 * 以下为前台调用方法
	 */
	 public function showtask(){
	 	$result = Db::name('task')->where('acco',1)->order('baifen asc , id desc')-> paginate(10);
		return $result;
	 }
	 
}