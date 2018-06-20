<?php
namespace app\admin20161108\model;
use think\Model;
use think\Db;

class Message extends Model
{
	protected $type       = [
        // 设置add_time为时间戳类型（整型）
        'add_time' => 'timestamp:Y-m-d H:i:s',
    ];
	
	public function messagelist(){
		$result = Db::name('message')->order('id','desc')->paginate(10);
		return $result;
	}
	
	
	public function del($id){
		$result = Db::name('message')->where('id',$id)->delete();
		return $result;
	}
	
	public function recontent($data){
		$result = Db::name('message')->where('id',$data['id'])->update($data);
		return $result;
	}
	
	public function search($search){
		$result = Db::name('message')->where('name|content|url','like','%'.$search.'%')->order('id','desc')->paginate(10);
		return $result;
	}
	
	//统计数量
	public function number(){
		$result = Db::name('message')->count();
		return $result;
	}
	
	/*
	 * 以下为前台调用方法
	 */
	
	public function showmessage(){
		$result = Db::name('message')->order('id','desc')->paginate(10);
		return $result;
	}
	
	
	public function add($data){
		$result = Db::name('message')->insert($data);
		return $result;
	}
	
	//查询该条留言用以邮件回复
	public function mailmessage($id){
		$result = Db::name('message')->where('id',$id)->find();
		return $result;
	}
}