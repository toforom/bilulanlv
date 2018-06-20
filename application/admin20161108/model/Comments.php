<?php
namespace app\admin20161108\model;
use think\Model;
use think\Db;

class Comments extends Model
{
	protected $type       = [
        // 设置add_time为时间戳类型（整型）
        'add_time' => 'timestamp:Y-m-d H:i:s',
    ];
	
	public function diarylist(){
		$result = Db::table('blog_comments')->alias('a')->join('blog_diary b ','a.idd= b.id')->where('type',1)->order('a.id','desc')->field('a.*,b.title')->paginate(10);
		return $result;
	}
	
	//后台获取被评论内容
	public function MenDiaryList(){
		$result = Db::name('comments')->where('type',1)->where('parent',0)->field('id,content')->select();
		return $result;
	}
	//后台获取文章被评论内容
	public function MenArticleList(){
		$result = Db::name('comments')->where('type',2)->where('parent',0)->field('id,content')->select();
		return $result;
	}
	
	public function articlelist(){
		$result = Db::table('blog_comments')->alias('a')->join('blog_article b ','a.idd= b.id')->where('type',2)->order('a.id','desc')->field('a.*,b.title')->paginate(10);
		return $result;
	}
	
	public function del($data){
		$result = Db::name('comments')->where('id',$data['id'])->delete();
		if ($result > 0){
			if ($data['type'] == 1){
				//删除掉内容表中的数量
				$result = Db::name('diary')->where('id',$data['idd'])->setDec('num_comments');
			}elseif($data['type'] == 2){
				$result = Db::name('article')->where('id',$data['idd'])->setDec('num_comments');
			}
		}
		return $result;
	}
	
	public function recontent($id,$content){
		$result = Db::name('comments')->where('id',$id)->setField('re_content',$content);
		return $result;
	}
	
	public function search($search){
		$result = Db::table('blog_comments')->alias('a')->join('blog_diary b ','a.idd= b.id')->where('a.name|a.content|a.url|b.title','like','%'.$search.'%')->order('a.id','desc')->field('a.*,b.title')->paginate(10);
		return $result;
	}
	
	public function searcharticle($search){
		$result = Db::table('blog_comments')->alias('a')->join('blog_article b ','a.idd= b.id')->where('a.name|a.content|a.url|a.idd','like','%'.$search.'%')->order('a.id','desc')->field('a.*,b.title')->paginate(10);
		return $result;
	}
	
	//统计数量
	public function number(){
		$result = Db::name('comments')->where('type',1)->count();
		return $result;
	}

	//统计文章评论数量
	public function numberarticle(){
		$result = Db::name('comments')->where('type',2)->count();
		return $result;
	}
  
  	//评论全部已读
  
  	public function commentAllRead($type=1){
      	if($type==1){
        	$result	= Db::name('comments')->where('type',1)->where('re_content',0)->where('authorId',0)->select();
          	for($i=0;$i < count($result); $i++){
            	$val = Db::name('comments')->where('id',$result[$i]['id'])->setField('re_content',1);
            }
        }elseif($type==2){
        	$result	= Db::name('comments')->where('type',2)->where('re_content',0)->where('authorId',0)->select();
          	for($i=0;$i < count($result); $i++){
            	$val = Db::name('comments')->where('id',$result[$i]['id'])->setField('re_content',1);
            }
        }
      	return $val;
      
    }
	
	/*
	 * 下面是前台调用方法
	 */
	//前台调用日志评论
	public function showcomments($id,$type=''){
		if ($type == 1){
			$result = Db::name('comments')->where('type',1)->where('idd',$id)->order('id','desc')->select();
		}elseif($type == 2){
			$result = Db::name('comments')->where('type',2)->where('idd',$id)->order('id','desc')->select();
		}
		return $result;
	}
	
	//前台调用日志评论的回复
	public function showrecomments($id,$type=''){
			if ($type == 1){
				$result = Db::name('comments')->where('type',1)->where('idd',$id)->where('parent','>',0)->order('id','asc')->select();
			}elseif($type == 2){
				$result = Db::name('comments')->where('type',2)->where('idd',$id)->where('parent','>',0)->order('id','asc')->select();
			}
			return $result;
		}
	//提交评论
	public function add($data){
		$result = new Comments;
		$result -> data($data);
		$result -> save();
		$result = $result -> id;
		//累计评识自增
		if ($result > 0){
			if ($data['type'] == 1){
				Db::name('diary')->where('id',$data['idd'])->setInc('num_comments');
			}elseif($data['type'] == 2){
				Db::name('article')->where('id',$data['idd'])->setInc('num_comments');
			}
		}
		return $result;
	}
	
	//查询该条回复发送邮件通知
	public function mailcomments($type,$id,$newid){
		$result = Db::name('comments')->where('id',$id)->find();
		if ($type == 2){
			$result = Db::table('blog_comments')->alias('a')->join('blog_article b ','a.idd = b.id')->where('a.id',$id)->field('a.*,b.title')->find();
		}elseif($type == 1){
			$result = Db::table('blog_comments')->alias('a')->join('blog_diary b ','a.idd = b.id')->where('a.id',$id)->field('a.*,b.title')->find();
		}
		$result['rename']=Db::name('comments')->where('id',$newid)->value('name');
		$result['recontent']=Db::name('comments')->where('id',$newid)->value('content');
		return $result;
	} 
	
	//每条评论回复次数累计
	public function IncContent($id){
		$result = Db::name('comments')->where('id',$id)->setInc('re_content');
		return $result;
	}
	//每条评论回复次数累减
	public function DecContent($id){
		$result = Db::name('comments')->where('id',$id)->setDec('re_content');
		return $result;
	}
	
	public function wuxianji($id){
		$result = Db::name('comments')->where('type',1)->where('idd',$id)->order('id','desc')->select();
		return $result;
	}

	//递归获取评论数组（前台调用）
	public function DeepCommlist($type,$id,$parent = 0,&$result = array()){
    $arr = Db::name('comments')->where('type',$type)->where('idd',$id)->where('parent',$parent)->order('id','desc')->select();
    if(empty($arr)){
        return 0;
    }
    foreach ($arr as $val) {
        $newArr=&$result[];
        $val["children"] = $this->DeepCommlist($type,$id,$val["id"],$newArr);   
        $newArr = $val;
    }
    return $result;
   }
}