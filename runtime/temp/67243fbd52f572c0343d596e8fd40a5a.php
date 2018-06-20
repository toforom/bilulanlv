<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"/www/wwwroot/bilulanlv/application/admin20161108/view/login/index.html";i:1496111980;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<title>后台管理</title>
<link href="__PUBLIC__/static/admin/login/css/style.css" rel='stylesheet' type='text/css' />
<script type="text/javascript" src="__PUBLIC__/static/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/layer/layer.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="overflow-y: hidden;">
		<div class="app-location">
			<div class="location"><img src="__PUBLIC__/static/admin/login/images/location.png" /></div>
			<form name="formlogin" method="post">
				<input type="text" class="username" name="username" placeholder="用户名">
				<input type="password" class="password" name="password" placeholder="密码">
			<div class="box">
				<input type="text" class="code" name="code" placeholder="验证码">
				<img id="verify_img" class="img" src="<?php echo captcha_src(); ?>" name="image" alt="验证码" onclick="this.src='<?php echo captcha_src(); ?>'">
			</div>
				<div class="submit">
				<input type="button" name="submit" value="登 陆" >
					
				</div>

			</form>
		</div>
</body>
<script>
$(document).ready(function(){
	
	$(document).keyup(function(event){
	 if(event.keyCode ==13){
	  $('input[name=submit]').trigger("click");
	 }
	});
	 
	$("input[name=submit]").click(function(){
		$.ajax({
			type:"post",
			url:'<?php echo url('./admin20161108/login/login','','',true); ?>',
			data:$('form[name=formlogin]').serialize(),
			datatype:'json',
			success:function(data){
				if(data.code==0 && data.data!=3){
					layer.msg(data.msg,{icon:2});
				}else if(data.code==1){
					layer.msg(data.msg,{icon:1,time:1500},function(){
						location.href=data.url;
					});
				}else if(data.data==3){
					layer.msg('验证码错误,请重新输入!',{icon:2});
					$('img[name=image]').click();
				}
			}
			
		});
	});

	
});
	
</script>
</html>