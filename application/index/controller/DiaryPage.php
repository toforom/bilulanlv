<?php
namespace app\index\controller;
use think\Controller;
use app\admin20161108\model\Diary as DiaryModel;
use app\admin20161108\model\Comments as CommentsModel;
use think\Session;
use app\admin20161108\controller\Mail;

class DiaryPage extends Left
{
    public function index($id)
    {
    	$result = new DiaryModel;
		$acco = $result -> acco($id);
		if ($acco <> 1){
			$this->redirect('/');
		}
		$val = $result ->diarypage($id);
		//dump($val);
		$result1 = new CommentsModel;
		$val3 = $result1 -> DeepCommlist(1,$id);
		$this -> assign('deep',$val3);
		$this -> assign('list',$val);
		$result -> click($id);
        return $this->fetch();
    }
	
	public function comments(){
		//dump(input('post.'));die;
		$data = input('post.');
		$data['add_time'] = time();
		$parentemail = $data['parentemail'];
		$recontent = input('post.content');
		$rename = input('post.name');
		$useradmin=Session::get('useradmin');
		if(empty($useradmin)){
			$data['authorId'] = 0;
		}else{
			$data['authorId'] = 1;
		}
		//对提交的数据过滤
		$result = $this ->validate($data,'Comments');
		if ($result !== true){
			$this -> error($result, 0, 0);
			return;
		}//验证结束
      	//记录cookie时间，5分钟内只能提交一次
		$DiaryNumcookie = cookie('DiaryNum');
		if (!$DiaryNumcookie){	
			cookie('DiaryNum',time());
		}elseif((time()-$DiaryNumcookie)<60){
			$this -> error('如果你不是机器人，就请一分钟后再试吧！^_^', 0, 0);
		}
		unset($data['parentemail']);
		$result = new CommentsModel;
		$val = $result -> add($data);
		if ($val > 0) {
        	cookie('DiaryNum',time());
			cookie(['prefix' => 'bilulanlv_', 'expire' => 1296000]);
			cookie('name', $data['name']);
			cookie('url', $data['url']);
			cookie('email', $data['email']);
			if ($data['parent'] > 0){
				$result -> IncContent($data['parent']);	
				$this -> success('评论成功！^_^',1,$data['parent'],$val);
			}else{
				$this -> success('评论成功！^_^', 1,1);
			}
		} else {
			$this -> error('提交失败！⊙︿⊙', 0, 0);
		}
	}

	public function DiaryMailComments(){
			//dump(input('post.'));
			$result = new CommentsModel;
			$mailval = $result ->mailcomments(1,input('post.parent'),input('post.newid'));
			$result = new Mail();
			$result -> sendmail(1,$mailval);
	}

	public function deep($parent=0,&$result=array()){
		$arr = Db::name('comments')->where('type',1)->where('idd',432)->where('parent',$parent)->order('id','desc')->field('id,idd,content,parent')->select();
		if($arr){
			$result[] = $arr;
		}
		foreach($arr as $val){
			$this -> deep($val['id'],$result);
		}
		return $result;
	}

}
