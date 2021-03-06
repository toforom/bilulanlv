<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/bilulanlv/application/admin20161108/view/linkchange/index.html";i:1496111979;}*/ ?>

 <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>友链修改</title>

    <link href="__PUBLIC__/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">

		    <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>友链修改 </h5>
                    </div>
                    <div class="ibox-content">
                    	<?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<form class="form-horizontal" name="formtask">
							<div class="form-group">
								<label class="col-sm-3 control-label">网站名称：</label>
								<div class="col-sm-4">
									<input type="type" name="title" value="<?php echo $vo['title']; ?>" placeholder="任务内容描述" class="form-control">
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-3 control-label">是否显示：</label>

								<div class="col-sm-4">
									<div class="checkbox checkbox-success checkbox-inline">
										<input type="radio" id="inlineRadio3" value="1" name="acco" <?php echo !empty($vo['acco']) && $vo['acco']==1?'checked' :''; ?>>
										<label for="inlineRadio3"> 显示 </label>
									</div>
									<div class="checkbox checkbox-warning checkbox-inline">
										<input type="radio" id="inlineRadio4" value="0" name="acco" <?php echo !empty($vo['acco']) && $vo['acco']==1?'' :'checked'; ?>>
										<label for="inlineRadio4"> 隐藏 </label>
									</div>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-3 control-label">网站LOGO：</label>
								<div class="col-sm-4">
									<input type="type" name="logourl" value="<?php echo $vo['logourl']; ?>" placeholder="logo地址为空,为文字链接" class="form-control">
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-3 control-label">网址：</label>
								<div class="col-sm-4">
									<input type="type" name="url" value="<?php echo $vo['url']; ?>" class="form-control">
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-3 control-label">网站描述：</label>
								<div class="col-sm-8">
									<input type="type" name="content" value="<?php echo $vo['content']; ?>" placeholder="网站描述" class="form-control">
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-3">
									<input type="hidden" name="id" value="<?php echo $vo['id']; ?>" />
									<button class="btn btn-sm btn-success" type="button" onclick="return chuan()">修改友链</button>
								</div>
							</div>
						</form>
						<?php endforeach; endif; else: echo "" ;endif; ?>
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
			function chuan() {
				//AJAX提交
				$.ajax({
					type:"post",
					url:'<?php echo url('./admin20161108/linkchange/edit','','',true); ?>',
					data:$('form[name=formtask]').serialize(),
					datatype:'json',
					success:function(data){
						if(data.code==0){
							layer.msg(data.msg,{icon:2});
						}else if(data.code==1){
							layer.msg(data.msg,{icon:1,time:1500},function(){
								history.go(-1);
							});
						}
					}
					
				});
			  }
</script>
</html>
