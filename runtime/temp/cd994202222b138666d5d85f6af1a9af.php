<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"/www/wwwroot/bilulanlv/application/index/view/task/index.html";i:1496114341;s:61:"/www/wwwroot/bilulanlv/application/index/view/left/index.html";i:1496223054;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

	<head>
		<title>更新任务系统</title>
		<meta name="keywords" content="关键词" />
		<meta name="description" content="描述" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="__PUBLIC__/static/index/pintuer.css">
		<link rel="stylesheet" href="__PUBLIC__/static/index/bilulanlv.css">
		<script src="__PUBLIC__/static/index/jquery.js"></script>
		<script src="__PUBLIC__/static/index/pintuer.js"></script>
		<style>
			.smalltime{
				font-family:arial;
				font-size: 12px;
				color: #A7B1C2;
			}
		</style>
	</head>

	<body>
		<div class="layout">

			<div class="line margin-big">

				<div class="xs2">

				</div>
				
<div class="xs3">
	<div class="leftboxborder radius-small">
		<div class="bg-main leftbox">
			<div class="leftboximage">
				<!--左边盒子头像-->
				<a href="./"><img src="__PUBLIC__/static/index/image/image.jpg" class="radius-circle"></a>
			</div>
			<div class="leftboxtitle">
				<h4 class="text-white">深蓝的博客</h4>
			</div>
			<div class="leftboxtitle2 border-small box-shadow-small">
				<h6>筚路蓝缕,以启山林!</h6>
			</div>
			<span class="margin-big">&nbsp;</span>

			<h6>
			<li>
			<a href="<?php echo url('index/Diary/index'); ?>">
			<div onmouseover="this.className='leftboxnavtin leftboxborbottow'" onmouseout="this.className='leftboxnav leftboxborbottow'" class="leftboxnav box-shadow-small leftboxborbottow radius-small">
				絮语<span class="icon-caret-right leftboxnavicon"></span>	
			</div>
			</a>
			</li>	
			<a href="<?php echo url('index/article/index'); ?>">
			<li>
			<div onmouseover="this.className='leftboxnavtin leftboxborbottow'" onmouseout="this.className='leftboxnav leftboxborbottow'" class="leftboxnav box-shadow-small leftboxborbottow radius-small">
				随笔<span class="icon-caret-right leftboxnavicon"></span>
			</div>
			</li>
			</a>
			<a href="<?php echo url('index/task/index'); ?>">
			<li>
			<div onmouseover="this.className='leftboxnavtin leftboxborbottow'" onmouseout="this.className='leftboxnav leftboxborbottow'" class="leftboxnav box-shadow-small leftboxborbottow radius-small">
				任务<span class="icon-caret-right leftboxnavicon"></span>
			</div>
			</li>
			</a>
			<a href="<?php echo url('index/link/index'); ?>">
			<li>
			<div onmouseover="this.className='leftboxnavtin leftboxborbottow'" onmouseout="this.className='leftboxnav leftboxborbottow'" class="leftboxnav box-shadow-small leftboxborbottow radius-small">
				朋友<span class="icon-caret-right leftboxnavicon"></span>
			</div>
			</li>
			</a>
			<a href="<?php echo url('index/message/index'); ?>">
			<li>
			<div onmouseover="this.className='leftboxnavtin '" onmouseout="this.className='leftboxnav '" class="leftboxnav box-shadow-small  radius-small">
				留言<span class="icon-caret-right leftboxnavicon"></span>
			</div>
			</li>
			</a>
			</h6>
			<span>&nbsp;</span>

				<div id="rollAD"  style="height:20px; position:relative; width:90%;margin:0 auto;overflow:hidden;">
					<div id="rollText" style="font-size:12px;width:90%; line-height:20px; margin: 0 auto;">
						<a href="#"><span class="icon-bullhorn">&nbsp;最近更新记录</span></a><br />
						<a href="<?php echo url('index/DiaryPage/index',array('id'=>$diary['id'])); ?>"><span class="icon-bullhorn">&nbsp;深蓝 <?php echo timeago($diary['add_time']); ?> 更新了日志：《<?php echo $diary['title']; ?>》</span></a><br />
						<a href="<?php echo url('index/ArticlePage/index',array('id'=>$article['id'])); ?>"><span class="icon-bullhorn">&nbsp;深蓝 <?php echo timeago($article['add_time']); ?> 更新了文章：《<?php echo $article['title']; ?>》 </span></a><br />
						<a href="<?php if($comments1['type']==1): ?><?php echo url('index/DiaryPage/index','id='.$comments1['idd']); else: ?><?php echo url('index/ArticlePage/index','id='.$comments1['idd']); endif; ?>"><span class="icon-bullhorn">&nbsp;<?php echo $comments1['name']; ?> <?php echo timeago($comments1['add_time']); ?> 评论了<?php echo !empty($comments1['type']) && $comments1['type']==1?'日志':'文章'; ?>说：<?php echo mb_substr($comments1['content'],0,10,"utf-8"); ?>... </span></a><br />
						<a href="<?php echo url('index/Message/index'); ?>"><span class="icon-bullhorn">&nbsp;<?php echo $message1['name']; ?> <?php echo timeago($message1['add_time']); ?> 添加了留言</span></a><br />
					</div>
			</div>
			<hr class="leftboxhr leftboxborbottow" />
			<div class="leftboxfoot">
				<h6>Copyright © 筚路蓝缕</h6>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
// <![CDATA[
var textDiv = document.getElementById("rollText");
var textList = textDiv.getElementsByTagName("a");
if(textList.length > 1){
	var textDat = textDiv.innerHTML;
	var br = textDat.toLowerCase().indexOf("<br",textDat.toLowerCase().indexOf("<br")+3);
	//var textUp2 = textDat.substr(0,br);
	textDiv.innerHTML = textDat+textDat+textDat.substr(0,br);
	textDiv.style.cssText = "position:absolute; top:0";
	var textDatH = textDiv.offsetHeight;MaxRoll();
}
var minTime,maxTime,divTop,newTop=0;
function MinRoll(){
	newTop++;
	if(newTop<=divTop+20){
		textDiv.style.top = "-" + newTop + "px";
	}else{
		clearInterval(minTime);
		maxTime = setTimeout(MaxRoll,3000);
	}
}
function MaxRoll(){
	divTop = Math.abs(parseInt(textDiv.style.top));
	if(divTop>=0 && divTop<textDatH-20){
		minTime = setInterval(MinRoll,1);
	}else{
		textDiv.style.top = 0;divTop = 0;newTop=0;MaxRoll();
	}
}
// ]]>
</script>
<div style="display:none;">
<script src="https://s13.cnzz.com/z_stat.php?id=1262062349&web_id=1262062349" language="JavaScript"></script>
</div>

				<div class="xs5">

					<div class="margin-large-top height">
						<div class="alert box-shadow-small radius-small border-main">
							<div class="rightboxtitle">
								<h3>更新任务系统</h3></div>
							<div class="border-Silver border-bottom border-dotted"></div>
							<!--分隔虚线-->
							<span class="">&nbsp;</span>

							<div class="panel admin-panel">
								<table class="table table-hover table-striped text-center">
									<tbody>
										<tr>
											<th>任务名称</th>
											<th width="10%">程度</th>
											<th width="25%">完成进度</th>
										</tr>
										<?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
											<tr>
												<td class="text-left"><?php echo $vo['title']; ?> <small class="text-gray smalltime">[<?php echo date("Y-m-d H:i:s",$vo['add_time']); ?>]</small></td>
												<td align="center" valign="middle">
												<?php
												switch($vo['state']){
													case 1:
													echo '<span class="tag bg-green">正常</span>';
													break;
													case 2:
													echo '<span class="tag bg-red">紧急</span></td>';
													break;
												}
									 			?>

														<td align="center" valign="middle">
															<div class="<?php if($vo['baifen']==100){echo 'progress';}else{echo 'progress progress-striped active';} ?>" title="完成 <?php echo $vo['baifen']; ?> % / 用时 <?php $vo['end_time']=='' ? $end=time() :$end=$vo['end_time'] ; echo number_format(($end-$vo['add_time'])/86400,2) ?> 天 ">
																<div class="progress-bar <?php if($vo['baifen']==100){echo 'bg-green';}else{echo 'bg-red';} ?>" style="width:<?php echo $vo['baifen']; ?>%;"><!--<?php if($vo['baifen']==100){echo '完成';}else{echo $vo['baifen'].'%';} ?>--></div>
																
															</div>
														</td>
											</tr>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</tbody>
								</table>
								<div class="panel-foot text-center">

									<div align="center" class="margin-big-top">
										<?php echo $list->render(); ?>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="xs2">

					</div>

				</div>

			</div>
		</div>
	</body>

</html>