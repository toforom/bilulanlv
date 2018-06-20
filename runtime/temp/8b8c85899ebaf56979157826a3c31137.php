<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/www/wwwroot/bilulanlv/application/admin20161108/view/taskadd/index.html";i:1496111981;}*/ ?>

 <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>添加任务</title>

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
                        <h5>添加新任务 </h5>
                    </div>
                    <div class="ibox-content">
						<form class="form-horizontal" name="formtask">
							<div class="form-group">
								<label class="col-sm-3 control-label">紧急程度：</label>

								<div class="col-sm-4">
									<div class="checkbox checkbox-success checkbox-inline">
										<input type="radio" id="inlineRadio1" value="1" name="state" checked="">
										<label for="inlineRadio1"> 正常 </label>
									</div>
									<div class="checkbox checkbox-danger checkbox-inline">
										<input type="radio" id="inlineRadio2" value="2" name="state">
										<label for="inlineRadio2"> 紧急 </label>
									</div>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-3 control-label">是否显示：</label>

								<div class="col-sm-4">
									<div class="checkbox checkbox-success checkbox-inline">
										<input type="radio" id="inlineRadio3" value="1" name="acco" checked="">
										<label for="inlineRadio3"> 显示 </label>
									</div>
									<div class="checkbox checkbox-warning checkbox-inline">
										<input type="radio" id="inlineRadio4" value="0" name="acco">
										<label for="inlineRadio4"> 隐藏 </label>
									</div>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-3 control-label">数字排序：</label>

								<div class="col-sm-2">
									<input type="type" name="sorting" placeholder="数字越大越靠前" class="form-control">
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-3 control-label">完成百分比：</label>
								<div class="col-sm-2">
									<div class="input-group">
                                        <input type="text" name="baifen" class="form-control"> <span class="input-group-addon">%</span>
                                    </div>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<label class="col-sm-3 control-label">任务内容：</label>

								<div class="col-sm-8">
									<input type="type" name="title" placeholder="任务内容描述" class="form-control">
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-3">
									<button class="btn btn-sm btn-success" type="button" onclick="return chuan()">提交新任务</button>
								</div>
							</div>
						</form>
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
					url:'<?php echo url('./admin20161108/taskadd/add','','',true); ?>',
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
