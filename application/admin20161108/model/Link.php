<?php
namespace app\admin20161108\model;
use think\Model;
use think\Db;

class Link extends Model
{
	
	//修改状态添加效果
	public function getAccoAttr($value){
		 $status = [0=>'<span class="label">隐藏</span>',1=>'<span class="label label-primary">显示</span>'];
         return $status[$value];
	}
	
	//统计数量
	public function number(){
		$result = Db::name('link')->count();
		return $result;
	}
	
	//点击隐藏/显示
	public function Show($id){
		$result = Db::name('link')->where('id',$id)->value('acco');
		if($result > 0){
			$val = Db::name('link')->where('id',$id)->setField('acco',0);
			if ($val > 0){
				return 1;
			}
		}elseif($result <= 0){
			$val = Db::name('link')->where('id',$id)->setField('acco',1);
			if ($val > 0){
				return 2;
			}
		}
	}
	
	//修改显示
	public function editlist($id) {
		$result = Db::name('link')->where('id',$id)->select();
		return $result;
	}
	
	//修改
	public function edit($data){
		$result = Db::name('link')->where('id',$data['id'])->update($data);
		return $result;
	}
	
	//删除
	public function del($id){
		$result = Db::name('link')->where('id',$id)->delete();
		return $result;
	}
	
	//搜索
	public function search($content){
		$result = Db::name('link')->where('title|url|content','like','%'.$content.'%')->paginate(10);
		return $result;
	}
	
	/*
	 * 下面为前台调用方法
	 */
	public function showlink($type=''){
		if ($type == 1){
			$result = Db::name('link')->where('acco',1)->where('logourl','<>','') -> order('click','desc') -> select();
		}elseif($type ==2){
			$result = Db::name('link')->where('acco',1)->where('logourl','') -> order('click','desc') -> select();
		}
		return $result;
	}
	
	//申请友链
	public function add($data){
		$title = Db::name('link')->where('title',$data['title'])->count();
		$url = Db::name('link')->where('url',$data['url'])->count();
		if(($title+$url) > 0){
			return 22;
		}
		$result = Db::name('link')->insert($data);
		return $result;
	}
	
	//点击自增
	public function click($id){
		Db::name('link')->where('id',$id)->setInc('click');
		$result = Db::name('link')->where('id',$id)->value('url');
		return $result;
	}
}