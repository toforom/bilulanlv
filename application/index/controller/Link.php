<?php
namespace app\index\controller;
use think\Controller;
use app\admin20161108\model\Link as LinkModel;
use think\Cookie;

class Link extends Left
{
    public function index()
    {
    	$result = new LinkModel;
		$val = $result ->showlink(1);
		$val1 = $result ->showlink(2);
		$this -> assign('list',$val);
		$this -> assign('list1',$val1);
        return $this->fetch();
    }
	
	public function add(){
		$data = input('post.');
		$data['add_time'] = time();
		//对提交的数据过滤
		$result = $this ->validate($data,'Link');
		if ($result !== true){
			$this -> error($result, 0, 0);
			return;
		}//验证结束
      //记录cookie时间，5分钟内只能提交一次
		$linkcookie = Cookie::get('LinkNum');
		$val = time()-$linkcookie;
		if (!$linkcookie){	
			Cookie::set('LinkNum',time());
		}elseif((time()-$linkcookie)<60){
			$this -> error('如果你不是机器人，就请一分钟后再试吧！^_^', 0, 0);
		}
		$result = new LinkModel;
		$val = $result -> add($data);
		if ($val == 1) {
         	Cookie::set('LinkNum',time());
			$this -> success('申请友链成功，等待站长回复！^_^', 1,1);
		} else if($val == 22) {
			$this -> error('兄台，可能出现重复的名称或者Url了，请检查一下是否已经添加友链了！⊙︿⊙', 0, 0);
		} else {
			$this -> error('提交申请失败！⊙︿⊙', 0, 0);
		}
	}
	
	//点击自增
	public function click($id){
		$result = new LinkModel;
		$val = $result -> click($id);
		//dump($val);
		if ($val != '') {
			$this->redirect($val,302);
          	//加访问跳转页面
			//$this -> assign('url',$val);
			//return $this->fetch('jump/index');
		} else {
			$this -> error('访问失败！⊙︿⊙', 0, 0);
		}
	}
}
