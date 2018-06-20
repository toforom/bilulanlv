<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function timey($t){
	$datee=date("d", $t);
	$nowdata=date("d", time());
	$nowdataa=$nowdata-$datee;
	$timey=time()-$t;
	switch($timey){
		case $timey>0 and $timey<10800 and $nowdataa==0:
		return '刚刚';
		break;
		case $timey>10800 and $timey<43200 and $nowdataa==0:
		return floor($timey/3600).'小时前';
		break;
		case $timey>43200 and $timey<86400 and $nowdataa==0:
		return '今天';
		break;
		case $nowdataa==1:
		return '昨天';
		break;
		case $nowdataa==2:
		return '前天';
		break;
		case $nowdataa>2 or $nowdataa<0:
		if($timey>86400){
			$timey=floor($timey/86400);
			return $timey.'天前';
		}else{
			return '昨天';
		}
		
		break;
	}
}

function timeago( $ptime ) {
   // $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if ($etime < 1) return "刚刚";     
    $interval = array (         
        12 * 30 * 24 * 60 * 60  =>  "年前",
        30 * 24 * 60 * 60       =>  "个月前",
        7 * 24 * 60 * 60        =>  "周前",
        24 * 60 * 60            =>  "天前",
        60 * 60                 =>  "小时前",
        60                      =>  "分钟前",
        1                       =>  "秒前"
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}

//后台絮语随机颜色
function RandomColor(){
	$colorall = array('success','warning','info','danger');
	$num = rand(0,3);
	$color = $colorall[$num];
	return $color;
}
