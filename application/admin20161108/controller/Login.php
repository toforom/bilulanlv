<?php
namespace app\admin20161108\controller;
use think\Controller;
use app\admin20161108\model\User as UserMdel;
use think\Session;
class Login extends Controller
{
    public function index()
    {
    	return $this->fetch();
    }
	
	public function login()
	{
		$username = input('post.username');
		$password = input('post.password');
		//对提交的数据过滤
		$result = $this -> validate(input('post.'), 'Login');
		if (true !== $result) {
			$this -> error($result, 0, 0);
			return;
		};//结束
		//对提交的验证码识别
		if (!captcha_check(input('post.code'))) {
			$this -> error('验证码错误,请重新输入！^_^', 0, 3);
			return;
		};
		//结束
		//对密码进行处理
		$result = new UserMdel;
		$rel=$result->getlogin($username);
		//密码加盐
		$salt = $result->Salt($username);
		if ($rel['user'] != $username || $rel['pass'] !=md5($password.$salt)){
			$this->error('用户名或者密码错误,请勿尝试爆破！⊙︿⊙',0,-1);
		}else{
			//登陆成功对登陆次数以及记录具体信息
			$val=$result->LoginSuccess($username);
			if ($val===1){
				Session::set('useradmin', $username);
				Session::set('useradminlastime', time());
				$this->success('登陆成功！^_^','./admin20161108/index');
			}
			
		}
	}
	
	public function loginout(){
		Session::delete('useradmin');
		Session::delete('useradminlastime');
		//$this->redirect('/public');
		$this->redirect(url('index'));
	}
}
