<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"/www/wwwroot/bilulanlv/application/index/view/index/index.html";i:1496057706;s:61:"/www/wwwroot/bilulanlv/application/index/view/left/index.html";i:1496223054;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

	<head>
		<title>深蓝的博客</title>
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
					<?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<div class="margin-large-top ">
							<div class="alert box-shadow-small radius-small border-main">
								<div class="rightboxtitle">
									<h3><a href="<?php if($vo['n_type'] == ''): ?> <?php echo url('index/DiaryPage/index',array('id'=>$vo['id'])); else: ?> <?php echo url('index/ArticlePage/index',array('id'=>$vo['id'])); endif; ?>"><?php echo htmlspecialchars_decode($vo['title']); ?></a></h3></div>
								<div class="border-Silver border-bottom border-dotted"></div>
								<!--分隔虚线-->
								<div class="imagewidth">
								<p class="text-indent height-big margin-big-top"><?php echo htmlspecialchars_decode($vo['content']); ?></p>
								</div>
							<h6 class="icon-calendar rightboxtime">&nbsp;<?php echo date("Y-m-d",$vo['add_time']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php if($vo['n_type'] == ''): ?> <?php echo url('index/DiaryPage/index',array('id'=>$vo['id'])); else: ?> <?php echo url('index/ArticlePage/index',array('id'=>$vo['id'])); endif; ?>"><font onmouseover="this.className='icon-heart'" onmouseout="this.className='icon-heart-o'" class="icon-heart-o"></font></a>&nbsp;<?php echo $vo['flag']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php if($vo['n_type'] == ''): ?> <?php echo url('index/DiaryPage/index',array('id'=>$vo['id'])); else: ?> <?php echo url('index/ArticlePage/index',array('id'=>$vo['id'])); endif; ?>#comment"><font onmouseover="this.className='icon-comment'" onmouseout="this.className='icon-comment-o'" class="icon-comment-o"></font></a>&nbsp;<?php echo $vo['num_comments']; ?></h6>
							</div>
						</div>

					<?php endforeach; endif; else: echo "" ;endif; ?>

					<div align="center" class="margin-big-top">
						<a href="<?php echo url('index/Diary/index'); ?>#bottom" class="button button-block">查看更多</a>
					</div>

					<div class="xs2">

					</div>

				</div>

			</div>
		</div>
	</body>

</html>