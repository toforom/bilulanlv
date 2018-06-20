<?php
namespace app\admin20161108\model;
use think\Model;
use think\Db;

class Article extends Model
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
	public function articlelist(){
		$result = Db::name('article')->order('id', 'desc') -> paginate(10);
			return $result;
	}
	
	
	//日志添加
	public function articleAdd($data){
		$result = Db::name('article')->insertGetId($data);
		return $result;
	}
	
	//日志列表
//	public function DiaryList(){
//		$result = Db::name('diary')->where('d_type',1)->order('id','desc')->paginate(10);
//		return $result;
//	}
	
	//点击隐藏/显示
	public function Show($id){
		$result = Db::name('article')->where('id',$id)->value('acco');
		if($result > 0){
			$val = Db::name('article')->where('id',$id)->setField('acco',0);
			if ($val > 0){
				return 1;
			}
		}elseif($result <= 0){
			$val = Db::name('article')->where('id',$id)->setField('acco',1);
			if ($val > 0){
				return 2;
			}
		}
	}
	
		//显示需要修改的信息
	public function editlist($id) {
		$result = Db::name('article')->where('id',$id)->select();
		return $result;
	}
	
	//修改日志
	public function edit($data){
		$result = Db::name('article')->where('id',$data['id'])->update($data);
		return $result;
	}
	
	//删除日志
	public function del($id){
		$result = Db::name('article')->where('id',$id)->delete();
		return $result;
	}
	
	//搜索
	public function so($data){
		$list = $data['list'];
		$content = trim($data['content']);
		if ($list === 'bt'){
		$result = Db::name('article')->where('title','like','%'.$content.'%')->paginate(10);
			return $result;
		}elseif($list === 'nr')
		$result = Db::name('article')->where('content','like','%'.$content.'%')->paginate(10);
			return $result;
	}
	
	//统计数量
	public function number(){
		$result = Db::name('article')->count();
		return $result;
	}
	
	/***
	 * 下面是前台调用方法
	 */
	 //文章详情页需要数据
	 
	 public function articlepage($id){
	 	$result = Db::name('article')->where('id',$id)->find();
		$up = Db::name('article')->where('acco>0 and id<'.$id)->order('id desc')->limit(1)->find();
		$result['next'] = $up['id'];
		$result['nexttitle'] = $up['title'];
		$down = Db::name('article')->where('acco>0 and id>'.$id)->order('id asc')->limit(1)->find();
		$result['prev']=$down['id'];
		$result['prevtitle']=$down['title'];
		$result['comments'] = Db::name('comments')->where('type',2)->where('idd',$id)->count();
		$result['description'] =trim (mb_substr(str_replace("&nbsp;",'',strip_tags($result['content'])),0,400)) ;
		return $result;
	 }
	 
	//列表显示
	public function showarticle(){
		$result = Db::name('article')->where('acco',1)->order('id', 'desc') -> paginate(10);
		return $result;
	}
	
	//访问统计
	public function click($id){
		$result = Db::name('article')->where('id',$id)->setInc('flag');
	}
	
	//文章是否显示
	public function acco($id){
		$result = Db::name('article')->where('id',$id)->value('acco');
		return $result;
	}
	
	//按类目搜索
	public function type($type){
		$result = Db::name('article')->where('acco',1)->where('n_type',$type)->order('id', 'desc') -> paginate(10);
		return $result;
	}
	 
}
