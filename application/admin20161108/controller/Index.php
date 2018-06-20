<?php
namespace app\admin20161108\controller;
use think\Controller;
use think\Db;
use app\admin20161108\model\Xuyu as XuyuModel;
use app\admin20161108\model\Comments as CommentsModel;

class Index extends Sessionlogin
{
    public function index()
    {
    	$diaryc = Db::name('comments')->where('type',1)->where('authorId',0)->where('re_content',0)->count();
		$articlec = Db::name('comments')->where('type',2)->where('authorId',0)->where('re_content',0)->count();
		$message = Db::name('message')->where('re_content is null')->count();
		$task = Db::name('task')->where('baifen','<',100)->count();
		$link = Db::name('link')->where('acco',0)->count();
		$chengyu = $this -> chengyu();
		$this -> assign('chengyu',$chengyu);
		$this -> assign('link',$link);
		$this -> assign('task',$task);
		$this -> assign('diary',$diaryc);
		$this -> assign('article',$articlec);
		$this -> assign('message',$message);
    	return $this->fetch();
    }
	
	public function mingyan(){
		$ch = curl_init();
	    $url = 'http://apis.baidu.com/txapi/dictum/dictum';
	    $header = array(
	        'apikey: c92be466ce0b8b101ab4cc4bcd1e63b6',
	    );
	    // 添加apikey到header
	    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT,2); 
	    // 执行HTTP请求
	    curl_setopt($ch , CURLOPT_URL , $url);
	    $res = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($res,true);
		//dump($result);die;
		if (empty($result)){
			$result = 0;
		}elseif(!array_key_exists('newslist',$result)){
			$result = 0;
		}
		return $result;
	}

	public function chengyu(){
		$ch = curl_init();
		//$this_header = array("content-type: application/x-www-form-urlencoded; charset=UTF-8");
		$url = 'http://chengyu.aies.cn';
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT,2); 
	    // 执行HTTP请求
	    curl_setopt($ch , CURLOPT_URL , $url);
	    $res = curl_exec($ch);
		curl_close($ch);
		$zz = '/[\x{4e00}-\x{9fa5}]{3,}/u';
		$b= (strpos($res,"keyscroll1"));
		$c= (strpos($res,'keyscroll2'));
		$val = substr($res,$b,$c); 
		//dump($val);
		preg_match_all($zz, $val, $list);
		$num = count($list[0]);
		if($num>0){
			$shu = rand(1,$num-1);
			$value = $list[0][$shu];
			$url='http://v.juhe.cn/chengyu/query?key=c5376e32872188d603ebb8d08325486b&word='.urlencode($value);  
			$context = stream_context_create(array(
				     'http' => array(
				      'timeout' => 3 //超时时间，单位为秒
				     ) 
				)); 
			$result = file_get_contents($url,0,$context);  
			$result = json_decode($result,true);
			if(!empty($result)){
				$result['name'] = $value;
			}else{
				$result = 0;
			}
		}else{
			$result = 0;
		}
		return $result;
	}

	public function AddXuYu(){
		$data = input('post.');
		$data['create_time'] = time();
		$result = new XuyuModel;
		$val = $result -> AddXuYu($data);
		if ($val == 1){
			$this -> success('添加絮语成功！^_^',1,1);
		}elseif($val == 2){
			$this -> error('此条絮语已经提交！^_^',2,0);
		}else{
			$this -> error('添加失败！⊙︿⊙',0,0);
		}
	}
	
	public function commentAllRead($type){
		$result = new CommentsModel;
      	$val = $result -> commentAllRead($type);
      	if($val > 0){
        	$this->success('全部更改已读成功！^_^',1,1);
        }else{
          $this -> error('更改已读失败！⊙︿⊙',0,0);
        }
	}
}
