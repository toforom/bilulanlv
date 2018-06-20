<?php
namespace app\admin20161108\model;
use think\Model;
use think\Db;

class Diary extends Model
{
	
	// 设置add_time为时间戳类型（整型）
	protected $type       = [
        'add_time' => 'timestamp:Y-m-d H:i:s',
    ];
	
		//修改状态添加效果
	public function getAccoAttr($value){
		 $status = [0=>'<span class="label">隐藏</span>',1=>'<span class="label label-primary">显示</span>'];
         return $status[$value];
	}
	
	//列表显示
	public function diarylist(){
		$result = Db::name('diary')->order('id', 'desc') -> paginate(10);
		return $result;
	}
	
	
	//日志添加
	public function DiaryAdd($data){
		$result = Db::name('diary')->insertGetId($data);
		return $result;
	}
	
	//日志列表
//	public function DiaryList(){
//		$result = Db::name('diary')->where('acco',1)->order('id','desc')->paginate(10);
//		return $result;
//	}
	
	//点击隐藏/显示
	public function Show($id){
		$result = Db::name('diary')->where('id',$id)->value('acco');
		if($result > 0){
			$val = Db::name('diary')->where('id',$id)->setField('acco',0);
			if ($val > 0){
				return 1;
			}
		}elseif($result <= 0){
			$val = Db::name('diary')->where('id',$id)->setField('acco',1);
			if ($val > 0){
				return 2;
			}
		}
	}
	
		//显示需要修改的信息
	public function editlist($id) {
		$result = Db::name('diary')->where('id',$id)->select();
		return $result;
	}
	
	//修改日志
	public function edit($data){
		$result = Db::name('diary')->where('id',$data['id'])->update($data);
		return $result;
	}
	
	//删除日志
	public function del($id){
		$result = Db::name('diary')->where('id',$id)->delete();
		return $result;
	}
	
	//搜索
	public function so($data){
		$list = $data['list'];
		$content = trim($data['content']);
		if ($list === 'bt'){
		$result = Db::name('diary')->where('title','like','%'.$content.'%')->paginate(10);
			return $result;
		}elseif($list === 'nr')
		$result = Db::name('diary')->where('content','like','%'.$content.'%')->paginate(10);
			return $result;
	}
	
	//统计数量
	public function number(){
		$result = Db::name('diary')->count();
		return $result;
	}
	
	/***
	 * 下面是前台调用方法
	 */
	 
	 //日志详情页需要数据
	 public function diarypage($id){
	 	$result = Db::name('diary')->where('id',$id)->find();
		$up = Db::name('diary')->where('acco >0 and id <'.$id)->order('id desc')->limit(1)->find();
		$result['next'] = $up['id'];
		$result['nexttitle'] = $up['title'];
		$down = Db::name('diary')->where('acco >0 and id >'.$id)->order('id asc')->limit(1)->find();
		$result['prev']=$down['id'];
		$result['prevtitle']=$down['title'];
		$result['comments'] = Db::name('comments')->where('type',1)->where('idd',$id)->count();
        $result['description'] =trim (mb_substr(str_replace("&nbsp;",'',strip_tags($result['content'])),0,400)) ;
		return $result;
	 }
	 
	//前台列表显示
	public function showdiary(){
		$result = Db::name('diary')->where('acco',1)->order('id', 'desc') -> paginate(10);
		//$result = Db::table('blog_diary')->alias('a')->join('blog_comments b ','a.id= b.idd')->paginate(10);
		return $result;
	}
	
	//访问统计
	public function click($id){
		$result = Db::name('diary')->where('id',$id)->setInc('flag');
	}
	
	//是否显示
	public function acco($id){
		$result = Db::name('diary')->where('id',$id)->value('acco');
		return $result;
	}
}
