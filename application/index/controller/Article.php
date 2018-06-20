<?php
namespace app\index\controller;
use think\Controller;
use app\admin20161108\model\Article as ArticleModel;

class Article extends Left
{
    public function index()
    {
    	$result = new ArticleModel;
		$val = $result ->showarticle();
		$this -> assign('list',$val);
        return $this->fetch();
    }
	
	public function type($type){
		$result = new ArticleModel;
		$val = $result -> type($type);
		$this -> assign('list',$val);
        return $this->fetch('index');
	}
}
