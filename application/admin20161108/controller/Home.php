<?php
namespace app\admin20161108\controller;
use think\Controller;
use think\Db;
class Home extends Sessionlogin
{
    public function index()
    {
    	//计算包含当月的最近6个月月份
    	
    	$y = date("Y");//当前年份
		$yy = $y-1;//上一年
    	$i = date("m");//当前月份
    	//$i = 1;
		$x = $i-5;//最近6个月
    	for ($x; $x<=$i; $x++) {
		   if($x<1){
		   	$z=$x+12;
			$month[] = $yy.'年'.$z.'月';
			$bw = $yy.'-'.$z.'-1';
			$bwt = $yy.'-'.$z.'-31';
			$diary[] = Db::name('diary')->whereTime('add_time','between',[$bw, $bwt])->count();
			$diaryc[] = Db::name('comments')->where('type',1)->where('authorId',0)->whereTime('add_time','between',[$bw, $bwt])->count();
			$article[] = Db::name('article')->whereTime('add_time','between',[$bw, $bwt])->count();
			$articlec[] = Db::name('comments')->where('type',2)->where('authorId',0)->whereTime('add_time','between',[$bw, $bwt])->count();
			$message[] = Db::name('message')->whereTime('add_time','between',[$bw, $bwt])->count();
		   }else{
		   	$month[] = $y.'年'.$x.'月';
			$bw = $y.'-'.$x.'-1';
			$bwt = $y.'-'.$x.'-31';
			$diary[] = Db::name('diary')->whereTime('add_time','between',[$bw, $bwt])->count();
			$diaryc[] = Db::name('comments')->where('type',1)->where('authorId',0)->whereTime('add_time','between',[$bw, $bwt])->count();
			$article[] = Db::name('article')->whereTime('add_time','between',[$bw, $bwt])->count();
			$articlec[] = Db::name('comments')->where('type',2)->where('authorId',0)->whereTime('add_time','between',[$bw, $bwt])->count();
			$message[] = Db::name('message')->whereTime('add_time','between',[$bw, $bwt])->count();
		   }
		};
		$count[] = Db::name('diary')->count();
		$count[] = Db::name('comments')->where('type',1)->where('authorId',0)->count();
		$count[] = Db::name('article')->count();
		$count[] = Db::name('comments')->where('type',2)->where('authorId',0)->count();
		$count[] = Db::name('message')->count();
		//博客上线时间
		$timetj['run']= floor((time()-strtotime("2012/3/5"))/86400);
		//新年倒计时
		$SpringDate  = "2018-2-15";//今年春节日期
		$SpringStmp  = strtotime($SpringDate);//春节时间戳
		$CurrentStmp = time();//当前时间戳
		$timetj['guonian'] = floor(($SpringStmp - $CurrentStmp)/(3600*24));
		$this ->assign('timetj',$timetj);
		$this ->assign('count',$count);
		$this ->assign('message',$message);
		$this ->assign('articlec',$articlec);
		$this ->assign('article',$article);
		$this ->assign('diary',$diary);
		$this ->assign('diaryc',$diaryc);
		$this ->assign('month',$month);
    	return $this->fetch();
    }
}
