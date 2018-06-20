<?php
namespace app\admin20161108\controller;
use think\Controller;
use app\admin20161108\model\Diary as DiaryModel;

class Diaryadd extends Sessionlogin
{
    public function index()
    {
    	return $this->fetch();
    }
	
	public function add(){
		$data = input('post.');
		//对需要提交的数据进行添加整合
		$data['add_time']=time();
		if ($data['weather'] == ''){
			$data['weather']='晴';
		}
		//对提交的数据过滤
		$result = $this ->validate(input('post.'),'Diaryadd');
		if ($result !== true){
			$this -> error($result, 0, 0);
			return;
		}//验证结束
		$result = new DiaryModel;
		$val = $result -> DiaryAdd($data);
		if ($val > 0){
            if($data['acco'] == 1){
            $url = 'https://www.bilulanlv.com/diary/'.$val.'.html';
          	postBaidu($url);
        	  }
			$this -> success('添加日志成功！^_^','./admin20161108/diary');
		}else{
			$this -> error('添加失败！⊙︿⊙',0,0);
		}
	}
}
