<?php
namespace app\admin20161108\model;
use think\Model;
use think\Db;

class Login extends Model
{
	  // 设置数据表（不含前缀）
    protected $name = 'user';
	
		//获取user表中的MD5值比对分析是否登陆
		public function getlogin($user){
//			$result=new Login();
//			$val=$result->where('user',$user)->find();
			$result = Db::name('user')->where('user',$user)->find();
			return $result;
		}
		
		//登陆成功后,对数据进行处理
		public function LoginSuccess($user){
			$jgtime = Db::name('user')->where('user',$user)->value('lastime');
			//number累计自增
			$result = Db::name('user')->where('user',$user)->setInc('number');
			Db::name('user')->where('user',$user)->setField(['lastime'=>time(),'jgtime'=>$jgtime,'lastip'=>$_SERVER["REMOTE_ADDR"]]);
			return $result;
		}
		
		public function Salt($user){
			//获取MD5加盐值
			$salt = Db::name('user')->where('user',$user)->value('salt');
			return $salt;
		}
	
}