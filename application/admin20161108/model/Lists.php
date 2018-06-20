<?php
namespace app\admin20161108\Model;
use think\Model;
use think\Db;

class Lists extends Model
{
	public function liebiao(){
		$result = Db::name('list')->where('type',1)->order('id','desc')->paginate(10);
		return $result;
	}
	
	public function add($data){
		$result = Db::name('list')->insert($data);
		return $result;
	}
	
		//删除
	public function del($id){
		$result = Db::name('list')->where('id',$id)->delete();
		return $result;
	}
}
