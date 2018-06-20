<?php
namespace app\index\controller;
use think\Controller;
use app\admin20161108\model\Message as MessageModel;

class Message extends Left
{
    public function index()
    {
    	$result = new MessageModel;
		$val = $result ->showmessage();
		$num = $result -> number();
		$this -> assign('count',$num);
		$this -> assign('list',$val);
		//dump($val);
        return $this->fetch();
    }
	
	public function add(){
		//dump(input('post.'));die;
		$data = input('post.');
		$data['add_time'] = time();
		//对提交的数据过滤
		$result = $this ->validate($data,'Message');
		if ($result !== true){
			$this -> error($result, 0, 0);
			return;
		}//验证结束
      	//记录cookie时间，5分钟内只能提交一次
		$Messagecookie = cookie('MessageNum');
		if (!$Messagecookie){	
			cookie('MessageNum',time());
		}elseif((time()-$Messagecookie)<60){
			$this -> error('如果你不是机器人，就请一分钟后再试吧！^_^', 0, 0);
		}
		$result = new MessageModel;
		$val = $result -> add($data);
		if ($val > 0) {
          	cookie('MessageNum',time());
			cookie(['prefix' => 'bilulanlv_', 'expire' => 108000]);
			cookie('name', $data['name']);
			cookie('url', $data['url']);
			cookie('email', $data['email']);
			$this -> success('留言成功！^_^', 1,1);
		} else {
			$this -> error('留言失败！⊙︿⊙', 0, 0);
		}
	}
}
