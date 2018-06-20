<?php
namespace app\admin20161108\model;
use think\Model;
use think\Db;

class User extends Model
{
		//获取user表中的MD5值比对分析是否登陆
		public function getlogin($user){
			//$result=new Login();
			//$val=$result->where('user',$user)->find();
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
		
		//获取MD5加盐值
		public function Salt($user,$salt=''){
			if (!empty($salt)){
				$result = Db::name('user')->where('user',$user)->setField('salt',$salt);
				//return $result;
				if ($result > 0){
					$result = Db::name('user')->where('user',$user)->setField('pass',md5('123456'.$salt));
					return $result;
				}
			}else{
				$salt = Db::name('user')->where('user',$user)->value('salt');
				return $salt;
			}
			
		}
		
		//修改密码
		public function ChangePass($user,$pass=''){
			if (!empty($pass)){
				$result = Db::name('user')->where('user',$user)->setField('pass',$pass);
				return $result;
			}else{
				$password = Db::name('user')->where('user',$user)->value('pass');
				return $password;
			}
		}
		
		//提交今日目标
		public function mubiaotoday($data){
			$result = Db::name('user')->where('user',$data['user'])->update($data);
			return $result;
		}
		
		//获取管理数据
		public function adminval($user){
			$result = Db::name('user')->where('user',$user)->find();
			return $result;
		}
		
}