<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"E:\WWW\bilulanlv\public/../application/index\view\link\index.html";i:1497880344;s:65:"E:\WWW\bilulanlv\public/../application/index\view\left\index.html";i:1497880343;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

	<head>
		<title>友情链接--记录筚路蓝缕创业生活的个人博客网站！</title>
		<meta name="keywords" content="关键词" />
		<meta name="description" content="描述" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="DOMAIN__PUBLIC__/static/index/pintuer.css">
		<link rel="stylesheet" href="DOMAIN__PUBLIC__/static/index/bilulanlv.css">
		<script src="DOMAIN__PUBLIC__/static/index/jquery.js"></script>
		<script src="DOMAIN__PUBLIC__/static/layer/layer.js"></script>
		<script src="DOMAIN__PUBLIC__/static/index/pintuer.js"></script>
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
				<a href="./"><img src="DOMAIN__PUBLIC__/static/index/image/image.jpg" class="radius-circle"></a>
			</div>
			<div class="leftboxtitle">
				<h4 class="text-white" title="深蓝个人博客">深蓝个人博客</h4>
			</div>
			<div class="leftboxtitle2 border-small box-shadow-small">
				<h6>筚路蓝缕,以启山林!</h6>
			</div>
			<span class="margin-big">&nbsp;</span>

			<h6>
			<li>
			<a href="DOMAIN<?php echo url('index/Diary/index'); ?>">
			<div onmouseover="this.className='leftboxnavtin leftboxborbottow'" onmouseout="this.className='leftboxnav leftboxborbottow'" class="leftboxnav box-shadow-small leftboxborbottow radius-small">
				絮语<span class="icon-caret-right leftboxnavicon"></span>	
			</div>
			</a>
			</li>	
			<a href="DOMAIN<?php echo url('index/article/index'); ?>">
			<li>
			<div onmouseover="this.className='leftboxnavtin leftboxborbottow'" onmouseout="this.className='leftboxnav leftboxborbottow'" class="leftboxnav box-shadow-small leftboxborbottow radius-small">
				随笔<span class="icon-caret-right leftboxnavicon"></span>
			</div>
			</li>
			</a>
			<a href="DOMAIN<?php echo url('index/task/index'); ?>">
			<li>
			<div onmouseover="this.className='leftboxnavtin leftboxborbottow'" onmouseout="this.className='leftboxnav leftboxborbottow'" class="leftboxnav box-shadow-small leftboxborbottow radius-small">
				任务<span class="icon-caret-right leftboxnavicon"></span>
			</div>
			</li>
			</a>
			<a href="DOMAIN<?php echo url('index/link/index'); ?>">
			<li>
			<div onmouseover="this.className='leftboxnavtin leftboxborbottow'" onmouseout="this.className='leftboxnav leftboxborbottow'" class="leftboxnav box-shadow-small leftboxborbottow radius-small">
				朋友<span class="icon-caret-right leftboxnavicon"></span>
			</div>
			</li>
			</a>
			<a href="DOMAIN<?php echo url('index/message/index'); ?>">
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
						<a href="DOMAIN<?php echo url('index/DiaryPage/index',array('id'=>$diary['id'])); ?>"><span class="icon-bullhorn">&nbsp;深蓝 <?php echo timeago($diary['add_time']); ?> 更新了日志：《<?php echo $diary['title']; ?>》</span></a><br />
						<a href="DOMAIN<?php echo url('index/ArticlePage/index',array('id'=>$article['id'])); ?>"><span class="icon-bullhorn">&nbsp;深蓝 <?php echo timeago($article['add_time']); ?> 更新了文章：《<?php echo $article['title']; ?>》 </span></a><br />
						<a href="DOMAIN<?php if($comments1['type']==1): ?><?php echo url('index/DiaryPage/index','id='.$comments1['idd']); else: ?><?php echo url('index/ArticlePage/index','id='.$comments1['idd']); endif; ?>"><span class="icon-bullhorn">&nbsp;<?php echo $comments1['name']; ?> <?php echo timeago($comments1['add_time']); ?> 评论了<?php echo !empty($comments1['type']) && $comments1['type']==1?'日志':'文章'; ?>说：<?php echo mb_substr($comments1['content'],0,10,"utf-8"); ?>... </span></a><br />
						<a href="DOMAIN<?php echo url('index/Message/index'); ?>"><span class="icon-bullhorn">&nbsp;<?php echo $message1['name']; ?> <?php echo timeago($message1['add_time']); ?> 添加了留言</span></a><br />
					</div>
			</div>
			<hr class="leftboxhr leftboxborbottow" />
			<div class="leftboxfoot">
				<h6 title="深蓝个人博客">Copyright © 深蓝个人博客</h6>
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
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';        
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>

				<div class="xs5">

					<div class="margin-large-top ">
						<div class="alert box-shadow-small radius-small border-main">
							<div class="rightboxtitle">
								<h3>友情链接(图片)<small> 按点击量动态排序</small></h3></div>
							<div class="border-Silver border-bottom border-dotted"></div>
							<!--分隔虚线-->
							<div class="margin-small-top">
								<?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
									<a href="DOMAIN<?php echo url('index/Link/click',array('id'=>$vo['id']),''); ?>" target="_blank"><img src="<?php echo $vo['logourl']; ?>" alt="<?php echo $vo['title']; ?>" title="<?php echo $vo['title']; ?>||<?php echo $vo['content']; ?>" width="87px" height="30px" class="margin-little-bottom" /></a>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</div>

						</div>
					</div>

					<div class="margin-large-top ">
						<div class="alert box-shadow-small radius-small border-main">
							<div class="rightboxtitle">
								<h3>友情链接(文字)<small> 按点击量动态排序</small></h3></div>
							<div class="border-Silver border-bottom border-dotted"></div>
							<!--分隔虚线-->
							<div class="margin-small-top">
								<?php if(is_array($list1) || $list1 instanceof \think\Collection): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
									<a class="link" href="<?php echo url('index/Link/click',array('id'=>$val['id']),''); ?>" target="_blank" alt="<?php echo $val['title']; ?>" title="<?php echo $val['title']; ?>||<?php echo $val['content']; ?>" style="line-height:20px;"><?php echo $val['title']; ?></a>&nbsp;&nbsp;

								<?php endforeach; endif; else: echo "" ;endif; ?>
							</div>

						</div>
					</div>

					<div class="margin-large-top height">
						<div class="alert box-shadow-small radius-small border-main">
							<div class="rightboxtitle">
								<h5>本站站点信息(<a href="#comment">申请友链</a>)</h5></div>
							<div class="border-Silver border-bottom border-dotted"></div>
							<!--分隔虚线-->
							<div class="margin-small-top fontmain">
								<p> <strong>友链要求：</strong>本站仅链接个人网站，以及本人认为质量优的叶子！请先做好本站链接，然后请在底部提交您的链接信息，本人收到信息后会及时处理，谢谢合作！
									<br>
									<strong>网站名称：</strong>"筚路蓝缕"
									<br>
									<strong>本站介绍：</strong><span class="text-red">筚路蓝缕,以启山林。</span>
									<br>
									<strong>链接地址：</strong><a href="//www.bilulanlv.com/"><span class="text-red">https://www.BiLuLanLv.com(筚路蓝缕简拼)</span></a>
									<br>
									<strong>Logo地址：</strong>https://www.BiLuLanLv.com/img/logo.gif
									<br>
									<strong>本站Logo：</strong><img src="//www.BiLuLanLv.com/img/logo.gif"/>

								</p>

							</div>

						</div>
					</div>
					<a id="comment" name="comment"></a>
					<div class="margin-large-top ">
						<div class="alert box-shadow-small radius-small border-main">
							<div class="rightboxtitle text-gray">
								<h5>申请友情链接</h5></div>

							<form name="formdata" class="form-x form-auto" method="post" action="DOMAIN<?php echo url('./index/Link/add',''); ?>" onSubmit="return checkpost();">
								<div class="form-group">
									<div class="label">
										<label for="username">
											网站名称：</label>
									</div>
									<div class="field">
										<input type="text" name="title" class="input" placeholder="*网站名称" style="width:50%;" />
									</div>
								</div>
								<div class="form-group">
									<div class="label">
										<label for="password">
											网站地址：</label>
									</div>
									<div class="field">
										<input type="text" name="url" class="input" placeholder="*http://" style="width:50%;" />
									</div>
								</div>
								<div class="form-group">
									<div class="label">
										<label for="password">
											logo地址：</label>
									</div>
									<div class="field">
										<input type="text" name="logourl" class="input" style="width:80%;" placeholder="不填默认为文字链接" />
									</div>
								</div>
								<div class="form-group">
									<div class="label">
										<label for="password">
											网站介绍：</label>
									</div>
									<div class="field">
										<input type="text" name="content" class="input" placeholder="选填" style="width:80%;" />
									</div>
								</div>

								<div class="diarysend">
									<button class="button button-small bg-gray margin-large-left linkbutton" type="button" onclick="checkpost()">提交申请</button>
								</div>
							</form>

						</div>
					</div>

					<div class="xs2">

					</div>

				</div>

			</div>
		</div>
		<script language="JavaScript">
			function checkpost() {
				if(formdata.title.value==""){
					layer.msg("网站名称不能为空！");
				    formdata.title.focus();
				    return false;
			   
			   }
			   if(formdata.url.value==""){
				   	layer.msg("网址不能为空！");
				    formdata.url.focus();
				    return false;
			   
			   }
				//AJAX提交
				$.ajax({
					type:"post",
					url:'<?php echo url('./index/Link/add','','',true); ?>',
					data:$('form[name=formdata]').serialize(),
					datatype:'json',
					success:function(data){
						if(data.code==0){
							layer.msg(data.msg);
						}else if(data.code==1){
							layer.msg(data.msg,{time:1500},function(){
								history.go(0);
							});
						}
					}
					
				});
			  }
              //获取随机颜色值
              function roundcolor(){
				return  '#' +    
				    (function(color){    
				    return (color +=  '0123456789abcdef'[Math.floor(Math.random()*16)])    
				      && (color.length == 6) ?  color : arguments.callee(color);    
				  })('');    
			}
			//遍历所有节点并重新设置CSS
			var x = document.getElementsByClassName("link");
			    for (var i = 0; i < x.length; i++) {
			    	x[i].style.color = roundcolor();
			    }
		</script>
	</body>

</html>