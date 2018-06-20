<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"/www/wwwroot/bilulanlv/application/index/view/article_page/index.html";i:1496114967;s:61:"/www/wwwroot/bilulanlv/application/index/view/left/index.html";i:1496223054;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

	<head>
			<title><?php echo $list['title']; ?></title>
			<meta name="keywords" content="关键词" />
			<meta name="description" content="<?php echo $list['description']; ?>" />
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="__PUBLIC__/static/index/pintuer.css">
			<link rel="stylesheet" href="__PUBLIC__/static/index/bilulanlv.css">
			<script src="__PUBLIC__/static/index/jquery.js"></script>
			<script src="__PUBLIC__/static/layer/layer.js"></script>
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
					<div class="margin-large-top ">
						<div class="alert box-shadow-small radius-small border-main">
							<div class="rightboxtitle">
								<h3><?php echo $list['title']; ?></h3></div>
							<div class="border-Silver border-bottom border-dotted"></div>
							<!--分隔虚线-->
							<div class="imagewidth" id="layer-photos-demo">
							<p class="text-indent height-big margin-big-top text-gray"><?php echo htmlspecialchars_decode($list['content']); ?></p>
							</div>
							<div class="xs6"><p class="text-gray"><span class="text-left">上一篇：<a href="<?php echo url('index/ArticlePage/index',array('id'=>$list['prev'])); ?>"><?php if($list['prev'] == ''): ?>^_^木有了<?php else: ?><?php echo $list['prevtitle']; endif; ?></a></span></p></div>
							<div class="xs6"><p class="text-gray text-right"><span class="text-right">下一篇：<a href="<?php echo url('index/ArticlePage/index',array('id'=>$list['next'])); ?>"><?php if($list['next'] == ''): ?>^_^木有了<?php else: ?><?php echo $list['nexttitle']; endif; ?></a></span></p></div>
							
							<h6 class="icon-calendar rightboxtime">&nbsp;<?php echo date("Y-m-d",$list['add_time']); ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url('/Article/type',array('type'=>$list['n_type'])); ?>"><font onmouseover="this.className='icon-folder-open'" onmouseout="this.className='icon-folder-open-o'" class="icon-folder-open-o"></font></a>&nbsp;<?php echo $list['n_type']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<font onmouseover="this.className='icon-heart'" onmouseout="this.className='icon-heart-o'" class="icon-heart-o">&nbsp;<?php echo $list['flag']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</font><font onmouseover="this.className='icon-comment'" onmouseout="this.className='icon-comment-o'" class="icon-comment-o">&nbsp;<?php echo $list['comments']; ?></font></h6>
		</div>
		</div>
		
		<a name="comment" id="comment"></a>
		<div class="margin-large-top ">
		<div class="alert box-shadow-small radius-small border-main">
			<div class="rightboxtitle text-gray"><h5 title="reid">评论</h5></div>

						<form name="formdata" method="post" class="" onSubmit="return checkpost();">
						<?php $image=rand(1,8)?>
							<div class="form-group">
								<div class="field">
									<div class="input-group">
										<span class="addon icon-user"></span>
										<input type="text" class="input input-auto text-gray" value="<?php echo \think\Cookie::get('bilulanlv_name'); ?>" name="name" size="25" placeholder="用户名" style="width:40%;" />
										<input type="hidden" name="idd" value="<?php echo $list['id']; ?>" />
										<input type="hidden" name="image" value="<?php echo $image ?>" />
										<input type="hidden" name="type" value="2" />
										<input type="hidden" name="parent" value="0" />
										<input type="hidden" name="parentemail" value="" />
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
										<textarea rows="3" cols="60" class="input input-auto" name="content" placeholder="评论内容/必填"></textarea>
									</div>
								</div>
							</div>
						
						<div class="diarysend">
							<button id="fbpl" class="button button-small bg-gray" type="button" onclick="checkpost()">发布评论</button>
						</div>
						</form>
						&nbsp;
						<?php if(is_array($deep) || $deep instanceof \think\Collection): $i = 0; $__LIST__ = $deep;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k): $mod = ($i % 2 );++$i;?>
								<div class="diarycontent border-top text-black text-little">
									<?php if($k['email'] == ''): ?>
									<img src="__PUBLIC__/static/index/image/<?php echo $k['image']; ?>-20.png" width="20px" height="20px" vspace="5" class="radius-circle"/>
									<?php else: ?>
									<img src="https://s.gravatar.com/avatar/<?php echo md5($k['email']); ?>?s=20" width="20px" height="20px" vspace="5" class="radius-circle"/>
									<?php endif; ?>
									<a href="<?php echo $k['url']; ?>" target="_blank"> <strong><?php if($k['name']==''){echo '无名大侠';}else{echo $k['name'];} ?></strong></a>：
									<?php echo $k['content']; ?> <span class="smallname"><a href="#comment" name="<?php echo $k['email']; ?>" id="<?php echo $k['id']; ?>" lang="<?php echo $k['name']; ?>" onclick="recomment(this.id,this.lang,this.name)">回复</a></span><br />
									<input name="eemail" type="hidden" value="<?php echo $k['email']; ?>" />
									<?php if(is_array($k['children']) || $k['children'] instanceof \think\Collection): $i = 0; $__LIST__ = $k['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k1): $mod = ($i % 2 );++$i;?>
									<div style="margin-left:20px;" class="border-top border-dotted text-gray">
										<img src="https://s.gravatar.com/avatar/<?php echo md5($k1['email']); ?>?s=20" width="20px" height="20px" vspace="5" class="radius-circle"/> <a href="<?php echo $k1['url']; ?>" target="_blank"><?php echo $k1['name']; ?></a>：<?php echo $k1['content']; ?> <span class="smallname"><a href="#comment" name="<?php echo $k1['email']; ?>" id="<?php echo $k1['id']; ?>" lang="<?php echo $k1['name']; ?>" onclick="recomment(this.id,this.lang,this.name)">回复</a></span>
									</div>
									<?php if(is_array($k1['children']) || $k1['children'] instanceof \think\Collection): $i = 0; $__LIST__ = $k1['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k2): $mod = ($i % 2 );++$i;?>
									<div style="margin-left:40px;" class="border-top border-dotted text-gray">
										<img src="https://s.gravatar.com/avatar/<?php echo md5($k2['email']); ?>?s=20" width="20px" height="20px" vspace="5" class="radius-circle"/> <a href="<?php echo $k2['url']; ?>" target="_blank"><?php echo $k2['name']; ?></a>：<?php echo $k2['content']; ?> <span class="smallname"><a href="#comment" name="<?php echo $k2['email']; ?>" id="<?php echo $k2['id']; ?>" lang="<?php echo $k2['name']; ?>" onclick="recomment(this.id,this.lang,this.name)">回复</a></span>
									</div>
									<?php if(is_array($k2['children']) || $k2['children'] instanceof \think\Collection): $i = 0; $__LIST__ = $k2['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k3): $mod = ($i % 2 );++$i;?>
									<div style="margin-left:60px;" class="border-top border-dotted text-gray">
										<img src="https://s.gravatar.com/avatar/<?php echo md5($k3['email']); ?>?s=20" width="20px" height="20px" vspace="5" class="radius-circle"/> <a href="<?php echo $k3['url']; ?>" target="_blank"><?php echo $k3['name']; ?></a>：<?php echo $k3['content']; ?> <span class="smallname"><a href="#comment" name="<?php echo $k3['email']; ?>" id="<?php echo $k3['id']; ?>" lang="<?php echo $k3['name']; ?>" onclick="recomment(this.id,this.lang,this.name)">回复</a></span>
									</div>
									<?php if(is_array($k3['children']) || $k3['children'] instanceof \think\Collection): $i = 0; $__LIST__ = $k3['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k4): $mod = ($i % 2 );++$i;?>
									<div style="margin-left:80px;" class="border-top border-dotted text-gray">
										<img src="https://s.gravatar.com/avatar/<?php echo md5($k4['email']); ?>?s=20" width="20px" height="20px" vspace="5" class="radius-circle"/> <a href="<?php echo $k4['url']; ?>" target="_blank"><?php echo $k4['name']; ?></a>：<?php echo $k4['content']; ?> 
									</div>
									<?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
								</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>


					</div>
				</div>

				<div class="xs2">

				</div>

			</div>

		</div>
		</div>
		<script language="JavaScript">
			function recomment(id,lang,name){
						$('h5[title=reid]').html('回复 '+lang+' 的评论');
						$('input[name=parent]').attr('value',id);
						$('input[name=parentemail]').attr('value',name);
				};
			function checkpost() {
				if (formdata.content.value == "") {
					layer.msg("评论内容不能为空！",{time:1500});
					formdata.content.focus();
					return false;
				}
				//AJAX提交
				$.ajax({
					type:"post",
					url:'<?php echo url('./index/ArticlePage/comments','','',true); ?>',
					data:$('form[name=formdata]').serialize(),
					datatype:'json',
					beforeSend:function(){
						$('button[id=fbpl]').attr('disabled',true);
						//layer.msg('正在向对方发送邮件通知...',{time:10000});
					},
					success:function(data){
						if(data.code==0){
							layer.msg(data.msg);
							$('button[id=fbpl]').attr('disabled',false);
						}else if(data.code==1 && data.data==1){
							layer.msg(data.msg,{time:1500},function(){
								history.go(0);
							});
						}else if(data.code==1 && data.data > 1){
							//
							layer.msg('评论成功，已经发送邮件通知对方。',{time:1500},function(){
								$.ajax({
										type:"post",
										url:'<?php echo url('./index/ArticlePage/ArticleMailComments','','',true); ?>',
										data:{parent:data.data,newid:data.wait},
										datatype:'json',
										success:function(data){
											history.go(0);
										}	
										});
								});
							//
						}
					}
					
				});
			  }
			//图片查看
			layer.ready(function(){ //为了layer.ext.js加载完毕再执行
				  layer.photos({
				    photos: '#layer-photos-demo'
				    ,anim: 3 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
				  });
				});   
		</script>
	</body>

</html>