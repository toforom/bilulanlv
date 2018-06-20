<?php
namespace app\admin20161108\controller;
use think\Controller;
use app\admin20161108\model\Article as ArticleModel;
use app\admin20161108\model\Lists as ListsModel;

class Articleadd extends Sessionlogin
{
    public function index()
    {
    	$result = new ListsModel;
		$val = $result -> liebiao();
		$this -> assign('list',$val);
		return $this->fetch();
    }
	
	public function add(){
		$data = input('post.');
		//dump($data);die;
		//对需要提交的数据进行添加整合
		$data['add_time']=time();
		if ($data['n_from'] == ''){
			$data['n_from']='原创';
		}
		//对提交的数据过滤
		$result = $this ->validate(input('post.'),'Articleadd');
		if ($result !== true){
			$this -> error($result, 0, 0);
			return;
		}//验证结束
		$result = new ArticleModel;
		$val = $result -> articleAdd($data);
		if ($val > 0){
          if($data['acco'] == 1){
            $url = 'https://www.bilulanlv.com/article/'.$val.'.html';
          	postBaidu($url);
        	  }
			$this -> success('添加文章成功！^_^','./admin20161108/article',1);
		}else{
			$this -> error('添加失败！⊙︿⊙',0,0);
		}
	}
}
