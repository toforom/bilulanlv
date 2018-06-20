<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Index as IndexModel;

class Index extends Left
{
    public function index()
    {
		//if ($_SERVER['HTTP_REFERER']==''){
         //   header("http://www.google.com"); 
       // } else{
       //     header("Location:/diary"); 
       // }
    	 $result = new IndexModel;
		 $val = $result ->alllist();
		 $this -> assign('list',$val);
		//dump($val);
		 return $this->fetch();
    }
}
