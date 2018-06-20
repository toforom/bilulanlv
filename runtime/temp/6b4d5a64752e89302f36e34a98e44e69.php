<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"/www/wwwroot/bilulanlv/application/index/view/article/index.html";i:1496057705;s:61:"/www/wwwroot/bilulanlv/application/index/view/left/index.html";i:1496223054;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

	<head>
		<title>我的文章</title>
		<meta name="keywords" content="关键词" />
		<meta name="description" content="描述" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="__PUBLIC__/static/index/pintuer.css">
		<link rel="stylesheet" href="__PUBLIC__/static/index/bilulanlv.css">
		<script src="__PUBLIC__/static/index/jquery.js"></script>
		<script src="__PUBLIC__/static/index/pintuer.js"></script>
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

				<div class="xs5 height-big">
					<?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$i): $mod = ($i % 2 );++$i;?>
						<div class="margin-large-top ">
							<div class="alert box-shadow-small radius-small border-main">
								<div class="rightboxtitle">
									<h3><a href="<?php echo url('index/ArticlePage/index',array('id'=>$i['id'])); ?>"><?php echo htmlspecialchars_decode($i['title']); ?></a></h3></div>
								<div class="border-Silver border-bottom border-dotted"></div>
								<!--分隔虚线-->
								<div class="imagewidth">
								<p class="text-indent height-big margin-big-top text-gray">
								<?php echo mb_substr(htmlspecialchars_decode($i['content']),0,500,"utf-8"); ?>...
								</p>
								</div>
								<br>
								<a href="<?php echo url('index/ArticlePage/index',array('id'=>$i['id'])); ?>" class="text-gray icon-angle-double-right">&nbsp;阅读全文<span class=""></span></a>
								
							<h6 class="icon-calendar rightboxtime">&nbsp;<?php echo date("Y-m-d",$i['add_time']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url('index/Article/type',array('type'=>$i['n_type'])); ?>"><font onmouseover="this.className='icon-folder-open'" onmouseout="this.className='icon-folder-open-o'" class="icon-folder-open-o"></font></a>&nbsp;<?php echo $i['n_type']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url('/ArticlePage/index',array('id'=>$i['id'])); ?>"><font onmouseover="this.className='icon-heart'" onmouseout="this.className='icon-heart-o'" class="icon-heart-o"></font></a>&nbsp;<?php echo $i['flag']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url('index/ArticlePage/index',array('id'=>$i['id'])); ?>#comment"><font onmouseover="this.className='icon-comment'" onmouseout="this.className='icon-comment-o'" class="icon-comment-o"></font></a>&nbsp;<?php echo $i['num_comments']; ?></h6>
							</div>
						</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>

					<div align="center" class="margin-big-top">
						<?php echo $list->render(); ?>
					</div>

					<div class="xs2">

					</div>

				</div>

			</div>
		</div>
	</body>
</html>