<?php
namespace app\admin20161108\controller;
use think\controller;
use think\Config;

//引入七牛上传类
require_once EXTEND_PATH . 'Qiniu/autoload.php';
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class Backup extends Sessionlogin
{
	public function index(){
		return $this -> fetch();
	}
	
	public function uptoken(){
		//wangedit集成七牛云获取上传token
		// 需要填写你的 Access Key 和 Secret Key
		$accessKey = 'XQNbJ9lBmvgFzwQhOCFLmF69ZHnG8KnShjMK9ti5';
		$secretKey = 'CKnKSbsjV8_FDpHHDnsP0_lNQkgTPG6DijVnds4q';

		// 构建鉴权对象
		$auth = new Auth($accessKey, $secretKey);

		// 要上传的空间
		$bucket = 'bilulanlvimage';

		// 生成上传 Token
		$token = $auth->uploadToken($bucket);

		//echo $token;
		echo json_encode(array('uptoken'=>$token));
	}
	
	public function back(){
			header ( "content-Type: text/html; charset=utf-8" );
			//备份数据库
			$host= Config::get('database.hostname');//数据库地址
			$dbname=Config::get('database.database');//数据库名称
			$user=Config::get('database.username');//数据库账号
			$password=Config::get('database.password');//数据库密码
			//这里的账号、密码、名称都是从页面传过来的
			$link = mysqli_connect($host, $user, $password, $dbname);
			if(!$link) //连接mysql数据库
			{
			// echo '数据库连接失败，请核对后再试';
			 echo '<script language="JavaScript">alert("数据库连接失败，请核对后再试");history.go(-1);</script>';
			 exit;
			}
			if(!mysqli_select_db($link,$dbname)) //是否存在该数据库
			{
			echo '<script language="JavaScript">alert("不存在数据库:'.$dbname.',请核对后再试");history.go(-1);</script>';
			exit;
			}
			mysqli_query($link,"set names 'utf8'");
			$mysql= "set charset utf8;\r\n";
			$q1=mysqli_query($link,"show tables");
			while($t=mysqli_fetch_array($q1)){
			  $table=$t[0];
			  $q2=mysqli_query($link,"show create table `$table`");
			  $sql=mysqli_fetch_array($q2);
			  $mysql.=$sql['Create Table'].";\r\n";
			  $q3=mysqli_query($link,"select * from `$table`");
			  while($data=mysqli_fetch_assoc($q3)){
				$keys=array_keys($data);
				$keys=array_map('addslashes',$keys);
				$keys=join('`,`',$keys);
				$keys="`".$keys."`";
				$vals=array_values($data);
				$vals=array_map('addslashes',$vals);
				$vals=join("','",$vals);
				$vals="'".$vals."'";
				$mysql.="insert into `$table`($keys) values($vals);\r\n";
			  }
			}
			$filename=ROOT_PATH."DataBack/".$dbname.date('Ymjgi').".sql"; //存放路径，默认存放到项目最外层
			$fp = fopen($filename,'w');
			fputs($fp,$mysql);
			fclose($fp);
			//echo $filename."数据备份成功";
			
			// 需要填写你的 Access Key 和 Secret Key
			$accessKey = 'XQNbJ9lBmvgFzwQhOCFLmF69ZHnG8KnShjMK9ti5';
			$secretKey = 'CKnKSbsjV8_FDpHHDnsP0_lNQkgTPG6DijVnds4q';

			// 构建鉴权对象
			$auth = new Auth($accessKey, $secretKey);

			// 要上传的空间
			$bucket = 'databack';

			// 生成上传 Token
			$token = $auth->uploadToken($bucket);
	
			// 要上传文件的本地路径
			$filePath = $filename;

			// 上传到七牛后保存的文件名
			$key ='bilulanlv' . date('Ymjgi') . '.sql';

			// 初始化 UploadManager 对象并进行文件的上传。
			$uploadMgr = new UploadManager();

			// 调用 UploadManager 的 putFile 方法进行文件的上传。
			list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
			//echo "\n====> putFile result: \n";
			if ($err !== null) {
			   var_dump($err);
			} else {
			  // var_dump($ret);
			  // echo '上传成功';
			   $result = @unlink ($filename); 
				if($result == 1){
				//echo  "删除成功";
				return $this->success('文件名:'.$key.'上传七牛云成功！^_^',1);
				}
				else{
				return $this->error('备份上传失败！⊙︿⊙',0);
				}
			}
	}



}
