<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"/www/wwwroot/bilulanlv/application/index/view/message/index.html";i:1496115087;s:61:"/www/wwwroot/bilulanlv/application/index/view/left/index.html";i:1496223054;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

	<head>
		<title>我的留言</title>
		<meta name="keywords" content="关键词" />
		<meta name="description" content="描述" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="__PUBLIC__/static/index/pintuer.css">
		<link rel="stylesheet" href="__PUBLIC__/static/index/bilulanlv.css">
		<script src="__PUBLIC__/static/index/jquery.js"></script>
		<script src="__PUBLIC__/static/layer/layer.js"></script>
		<script src="__PUBLIC__/static/index/pintuer.js"></script>
		<style>
			.x11{
				font-family: "微软雅黑";
				font-size: 14px;
				line-height: 15pt;
			}
			.smalltime{
				font-family:arial;
				font-size: 12px;
				color: #A7B1C2;
			}
			.smallname{
				color: #A7B1C2;
				font-size: 12px;
			}
			.smallname a:link{
				color:#A7B1C2;
			}
			.smallname a:hover{
				color:#A7B1C2;
			}
			.smallname a:active{
				color:#A7B1C2;
			}
			.smallname a:visited{
				color:#A7B1C2;
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

							<div class="margin-large-top ">
		<div class="alert box-shadow-small radius-small border-main">
			<div class="rightboxtitle"><h3>当前共有 <?php echo $count; ?> 条留言</h3></div>
			<div class="border-Silver border-bottom border-dotted"></div><!--分隔虚线-->
			<span class="">&nbsp;</span>
		
				<div class="container fontmain" style="width:100%;">
					<?php if(is_array($list) || $list instanceof \think\Collection): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
					<br />
					<?php if($k % 2 != 0): ?>
					<div class="line">
						<div class="x1">
							<div>
								<a href="<?php echo $vo['url']; ?>" title="<?php echo $vo['name']; ?>" target=”_blank><?php if($vo['email'] == ''): ?><img src="__PUBLIC__/static/index/image/<?php echo $vo['image']; ?>.png" class="imagewidth img-responsive radius-circle" style="margin-left:-10px ;"><?php else: ?><img src="https://s.gravatar.com/avatar/<?php echo md5($vo['email']); ?>" class="imagewidth img-responsive radius-circle" style="margin-left:-10px ;"><?php endif; ?></a>
							</div>
						</div>
						
						<div class="x11">
							<div class="popo">
								<div class="popo-left">
									<div style="margin-bottom:-8px;">
									<span class="smallname"><a href="<?php echo $vo['url']; ?>" title="<?php echo $vo['name']; ?>" target=”_blank><?php echo !empty($vo['name'])?$vo['name'] : '无名大虾'; ?></a> ▪ </span><span class="smalltime"><?php echo date('Y-m-d',$vo['add_time']); ?> </span><span class="smallname" style="display: none;"><a href="#recomment" id="<?php echo $vo['id']; ?>" lang="<?php echo $vo['name']; ?>" onclick="recomment(this.id,this.lang)">回复</a></span>
									</div>
									<div class="popo-body radius"><span class="icon-caret-right"></span> <?php echo $vo['content']; if($vo['re_content'] !=''): ?>
										<div class="border-gray-light border-top border-dashed margin-small-top margin-small-bottom"></div>
										<span class="icon-child" style="margin-left: 20px;"> <?php echo $vo['re_content']; ?></span>
									<?php else: endif; ?>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<?php elseif($k % 2 == 0): ?>
					<div class="line marggin-small">
						<div class="x11">
							<div class="popo">
								<div class="popo-right">
									<div style="margin-bottom:-8px;text-align: right;">
									<span class="smallname" style="display: none;"><a href="#recomment" id="<?php echo $vo['id']; ?>" lang="<?php echo $vo['name']; ?>" onclick="recomment(this.id,this.lang)">回复</a></span> <span class="smalltime"><?php echo date('Y-m-d',$vo['add_time']); ?> ▪ </span><span class="smallname"><a href="<?php echo $vo['url']; ?>" title="<?php echo $vo['name']; ?>" target=”_blank><?php echo !empty($vo['name'])?$vo['name'] : '无名大虾'; ?></a></span>
									</div>
									<div class="popo-body radius"><span class="icon-caret-right"></span> <?php echo $vo['content']; if($vo['re_content'] !=''): ?>
										<div class="border-gray-light border-top border-dashed margin-small-top margin-small-bottom"></div>
										<span class="icon-child" style="margin-left: 20px;"> <?php echo $vo['re_content']; ?></span>
									<?php else: endif; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="x1">
							<div>
								<a href="<?php echo $vo['url']; ?>" title="<?php echo $vo['name']; ?>" target=”_blank><?php if($vo['email'] == ''): ?><img src="__PUBLIC__/static/index/image/<?php echo $vo['image']; ?>.png" class="imagewidth img-responsive radius-circle" style="margin-left:10px ;"><?php else: ?><img src="https://s.gravatar.com/avatar/<?php echo md5($vo['email']); ?>?s=50" class="imagewidth img-responsive radius-circle" style="margin-left: 10px;"><?php endif; ?></a>
							</div>
						</div>
					</div>
					<?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</div>
						<div align="center" class="margin-big-top">
							<?php echo $list->render(); ?>
						</div>
						</div>
						
						</div>
					<form name="formdata" method="post" class="" onSubmit="return checkpost();">
						<div class="margin-large-top ">
							<div class="alert box-shadow-small radius-small border-main">
								<div class="rightboxtitle text-gray">
									<h5 title="reid">给我留言</h5></div>
									<a name="recomment" id="recomment"></a>
					
						<?php $image=rand(1,8)?>
							<div class="form-group">
								<div class="field">
									<div class="input-group">
										<span class="addon icon-user"></span>
										<input type="text" class="input input-auto text-gray" value="<?php echo \think\Cookie::get('bilulanlv_name'); ?>" name="name" size="25" placeholder="用户名" style="width:40%;" />
										<input type="hidden" name="image" value="<?php echo $image ?>" />
										<!-- <input type="hidden" name="parent" value="0" /> -->
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="field">
									<div class="input-group">
										<span class="addon icon-link"></span>
										<input type="text" class="input input-auto text-gray" value="<?php echo \think\Cookie::get('bilulanlv_url'); ?>" name="url" size="25" placeholder="http://" style="width:40%;" />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="field">
									<div class="input-group">
										<span class="addon icon-envelope-o"></span>
										<input type="text" class="input input-auto text-gray" value="<?php echo \think\Cookie::get('bilulanlv_email'); ?>" name="email" size="25" placeholder="E-mail" style="width:40%;" />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="field">
									<div class="input-group">
										<textarea rows="3" cols="60" class="input input-auto" name="content" placeholder="留言内容/必填"></textarea>
									</div>
								</div>
							</div>
						
						<div class="diarysend">
							<button id="fbpl" class="button button-small bg-gray" type="button" onclick="checkpost()">发布评论</button>
						</div>
						

					</div>
					</div>
					</form>
					<div class="xs2">

					</div>

				</div>

			</div>
		</div>
		<script language="JavaScript">
			function recomment(id,lang){
				$('h5[title=reid]').html('回复 '+lang+' 的留言');
				$('input[name=parent]').attr('value',id)
			}
		
			function checkpost() {
				if (formdata.content.value == "") {
					layer.msg("回复留言内容不能为空！",{time:1500});
					formdata.content.focus();
					return false;
				}
				//AJAX提交
				$.ajax({
					type:"post",
					url:'<?php echo url('./index/message/add','','',true); ?>',
					data:$('form[name=formdata]').serialize(),
					datatype:'json',
					beforeSend:function(){
						$('button[id=fbpl]').attr('disabled',true);
					},
					success:function(data){
						if(data.code==0){
							layer.msg(data.msg);
							$('button[id=fbpl]').attr('disabled',false);
						}else if(data.code==1){
							layer.msg(data.msg,{time:1500},function(){
								history.go(0);
							});
						}
					}
					
				});
			  }
		</script>
	</body>

</html>