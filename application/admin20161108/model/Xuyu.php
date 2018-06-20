<?php
namespace app\admin20161108\model;
use think\Model;
use think\Db;

class Xuyu extends Model
{
	//添加絮语
    public function AddXuYu($data){
        $search = Db::connect('mysql://xuyuAPI:GNhZ8SirCH@127.0.0.1:3306/xuyuAPI#utf8')
            ->name('xuyu')->where('content',$data['content'])->find();
        //$search = Db::name('xuyu')->where('title',$data['title'])->find();
        if ($search > 0){
            $result = 2;
        }else{
            $result = Db::connect('mysql://xuyuAPI:GNhZ8SirCH@127.0.0.1:3306/xuyuAPI#utf8')
                ->name('xuyu')->insert($data);
        }
        return $result;
    }

    //后台展示
	public function XuyuList(){
		$result = Db::connect('mysql://xuyuAPI:GNhZ8SirCH@127.0.0.1:3306/xuyuAPI#utf8')
            ->name('xuyu')->order('id','desc')->paginate(20);
		return $result;
	}
}
