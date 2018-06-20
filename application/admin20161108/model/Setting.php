<?php
namespace app\admin20161108\model;
use think\Model;
use think\Db;

class Setting extends Model
{
	public function listmail($group=''){
		$result = Db::name('setting')->where('group',$group)->select();
		return $result;
	}
	
	public function changemail($data){
		$setting = new Setting;
		$list = [
		    ['id'=>1, 'value'=>$data['Username']],
		    ['id'=>2, 'value'=>$data['Password']],
		    ['id'=>3, 'value'=>$data['FromName']],
		    ['id'=>4, 'value'=>$data['Subject']]
		];
		$result = $setting->saveAll($list);
		return $result;
	}
}
