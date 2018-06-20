<?php
namespace app\admin20161108\controller;
use think\Controller;
use app\admin20161108\model\User as UserModel;
use app\admin20161108\model\Setting as SettingModel;
use think\Session;
use think\Config;

class Setting extends Sessionlogin
{
    public function index()
    {
    	$user = Session::get('useradmin');
    	$result = new UserModel;
		$mail = new SettingModel;
		$mail = $mail->listmail('SendMail');
		$val = $result->adminval($user);
		$this->assign('list',$val);
		$this->assign('mail',$mail);
    	return $this->fetch();
    }
	
	public function ChangePass(){
		//dump(input('post.'));
		//获取原始密码密文
		$user = Session::get('useradmin');
		$result = new UserModel;
		$passold = $result->ChangePass($user);
		//echo $passold;die;
		$salt =    $result->Salt($user);
		$oldpass = input('post.oldpass');
		$pass1 = input('post.password1');
		$pass2 = input('post.password2');
		if (md5($oldpass.$salt) !== $passold){
			return $this->error('原始密码不同,请想想再试！^_^',0,0);
			//return $passold;
		}
		if ($pass1 != $pass2){
			return $this->error('新旧密码不一样,请返回修改！^_^',0,0);
		}elseif($oldpass === $pass1 and $oldpass === $pass2){
			return $this->error('更改的密码不能与旧密码相同！^_^',0,0);
		}else{
			$val = $result->ChangePass($user,md5($pass1.$salt));
			if ($val === 1){
				return $this->success('新密码修改成功,请牢记！^_^',1);
			}
		}
		
	}
	
	public function ChangeMiWen(){
		//dump(input('post.'));
		$user = Session::get('useradmin');
		$salt = input('post.salt');
		$result = new UserModel;
		$val = $result->Salt($user,$salt);
		if ($val !== 0){
			return $this->success('修改密文成功,密码初始化为123456,请立即进行新密码设定,否则会导致无法登陆！^_^',1,1,5);
		}else{
			return $this->error('修改失败！⊙︿⊙',0);
		}
	}
	
	public function mubiao(){
		$user = Session::get('useradmin');
		$today = input('post.today');
		$data['mubiao_last'] = $today;
		$data['mubiao_time'] = time();
		$data['user'] = $user;
		//对提交的数据过滤
		$result = $this ->validate(input('post.'),'Setting');
		if ($result !== true){
			$this -> error($result, 0, 0);
			return;
		}//验证结束
		$result = new UserModel;
		$value = $result -> adminval($user);
		$month1=date('m',$value['mubiao_time']);
		$month2=date('m',time());
		$data['total']=$value['total']+$today;
		$data['mubiao_ok']=$value['mubiao_ok']+$today;
		$data['mubiao_last']=$today;
		$data['mubiao_time']=time();
		$data['user']=$user;
		if ($month1 === $month2){
			$data['mubiao_month']=$value['mubiao_month']+$today;
			$val = $result->mubiaotoday($data);
		}else{
			$data['mubiao_month']=$today;
			$val = $result->mubiaotoday($data);
		}
		if ($val !== 0){
			return $this->success('提交成功！^_^','./admin20161108/setting',1,1);
		}else{
			return $this->error('提交失败！⊙︿⊙',0);
		}
	}
	
	public function changeemail(){
		//dump(input('post.'));
		$data = input('post.');
		$result = new SettingModel;
		$val = $result ->changemail($data);
		if ($val > 0){
			return $this->success('修改成功！^_^','./admin20161108/setting',1,1);
		}else{
			return $this->error('修改失败！⊙︿⊙',0);
		}

	}
	
	public function subBD(){
			$url = 'https://www.bilulanlv.com/diary/479.html';
          	$result = postBaidu($url);
      		echo $result;
	}
	
	
}
