<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/www/wwwroot/bilulanlv/application/admin20161108/view/backup/index.html";i:1496111977;}*/ ?>
<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>数据库备份(七牛上传)</title>
		<link href="__PUBLIC__/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
		<link href="__PUBLIC__/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">

		<link href="__PUBLIC__/static/admin/css/animate.css" rel="stylesheet">
		<link href="__PUBLIC__/static/admin/css/style.css?v=4.1.0" rel="stylesheet">

	</head>

	<body class="gray-bg">

		<!--带动画效果内容-->
		<div class="wrapper wrapper-content animated fadeInRight">
			<div class="row">
				<div class="col-sm-12">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>备份数据库(上传七牛) </h5>
						</div>
						<div class="ibox-content">

							<button type="button" class="btn btn-block btn-success" onclick="up()">点击备份上传</button>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- 全局js -->
		<script src="__PUBLIC__/static/admin/js/jquery.min.js?v=2.1.4"></script>
		<script type="text/javascript" src="__PUBLIC__/static/layer/layer.js"></script>

	</body>
<script type="text/javascript">
	function up(){
		//AJAX提交
		$.ajax({
			type:"get",
			url:'<?php echo url('./admin20161108/backup/back','','',true); ?>',
			datatype:'json',
			beforeSend:function(){
				//加载层
				var index = layer.load(2, {shade: false});
			},
			success:function(data){
				if(data.code==0){
					layer.msg(data.msg,{icon:2},function(index){
						layer.close(index);
						history.go(0);
					});
				}else if(data.code==1){
					layer.alert(data.msg,{icon:1},function(index){
						layer.close(index);
						history.go(0);
						
					});
				}
			}
			
		});
	}
</script>
</html>