<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"/www/wwwroot/bilulanlv/application/admin20161108/view/task/index.html";i:1496111980;}*/ ?>
<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>全部任务列表</title>
		<link rel="shortcut icon" href="favicon.ico">
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
							<h5>任务列表 </h5>
						</div>
						<div class="ibox-content">

							<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
								<div class="row">
									<div class="col-sm-6">
										<div class="dataTables_length" id="DataTables_Table_0_length" style="padding-top:10px;">每页 10 条 总共 <?php echo $num; ?> 条记录</div>
									</div>
									
									<form name="formso" method="post" action="<?php echo url('task/search'); ?>" onsubmit="return searcheck();">
									<div class="col-sm-6" align="right">
										<div class="col-sm-2">

										</div>
										<div class="col-sm-4 input-group">
											<input type="text" placeholder="请输入关键词" name="content" class="input-sm form-control" style="height:33px;">
											<span class="input-group-btn">
                                        <button type="submit"  class="btn btn-sm btn-primary" style="height:33px;"> 搜索</button>
                                    	</span>
										</div>
									</div>
									</form>
								</div>
								
								<table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
									<thead>
										<tr role="row">
											<th style="width: 40px;">编号</th>
											<th style="width: 316px;">标题</th>
											<th style="width: 50px;cursor:pointer;" title="点击进行排序"><a href="<?php echo url('task/sorting','type=state'); ?>">程度</a></th>
											<th style="width: 127px;"><a href="<?php echo url('task/sorting','type=baifen'); ?>">百分比</a></th>
											<th style="width: 50px;">显示</th>
											<th style="width: 50px;"><a href="<?php echo url('task/sorting','type=sorting'); ?>">排序</a></th>
											<th style="width: 80px;">发布时间</th>
											<th style="width: 50px;">操作</th>
										</tr>
									</thead>
									<?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
									<tbody>
										<tr class="gradeA odd">
											<td class="sorting_1"><?php echo $vo['id']; ?></td>
											<td class=""><strong><?php echo $vo['title']; ?></strong></td>
											<td class=""><span id="<?php echo $vo['id']; ?>" onclick="stateajax(this.id)" style="cursor:pointer;"><?php echo $vo['state']; ?></span></td>
											<td class="">
												<div class="progress progress-striped active" style="margin-bottom:0px;" title="完成<?php echo $vo['baifen']; ?>%">
					                            <div style="width:<?php echo $vo['baifen']; ?>%;" aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar progress-bar-danger">
					                            </div>
					                     	   </div>
											</td>
											<td class=""><span id="<?php echo $vo['id']; ?>" onclick="showajax(this.id)" style="cursor:pointer;"><?php echo $vo['acco']; ?></span></td>
											<td class=""><?php echo $vo['sorting']; ?></td>
											<td class=""><?php echo date("Y-m-d H:i:s",$vo['add_time']); ?></td>
											<td class="" ><a href="<?php echo url('taskchange/index','id='.$vo['id']); ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-trash" id="<?php echo $vo['id']; ?>" onclick="deleajax(this.id)" style="cursor:pointer;"></span></td>
										</tr>
									</tbody>
									<?php endforeach; endif; else: echo "$empty" ;endif; ?>
								</table>
								
								<div class="row" align="right">
									<div class="col-sm-12">
									<?php echo $list->render(); ?>
									</div>
									
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- 全局js -->
		<script src="__PUBLIC__/static/admin/js/jquery.min.js?v=2.1.4"></script>
		<script type="text/javascript" src="__PUBLIC__/static/layer/layer.js"></script>
		<script src="__PUBLIC__/static/admin/js/bootstrap.min.js?v=3.3.6"></script>

	</body>
<script type="text/javascript">
function showajax(id){
		//AJAX提交
				$.ajax({
					type:"post",
					url:'<?php echo url('./admin20161108/task/show','','',true); ?>',
					data:{id:id},
					datatype:'json',
					success:function(data){
						if(data.code==0){
							layer.msg(data.msg,{icon:2});
						}else if(data.code==1){
							layer.msg(data.msg,{icon:1,time:1500},function(){
								history.go(0);
							});
						}
					}
					
				});

				};

function stateajax(id){
		//AJAX提交
				$.ajax({
					type:"post",
					url:'<?php echo url('./admin20161108/task/state','','',true); ?>',
					data:{id:id},
					datatype:'json',
					success:function(data){
						if(data.code==0){
							layer.msg(data.msg,{icon:2});
						}else if(data.code==1){
							layer.msg(data.msg,{icon:1,time:1500},function(){
								history.go(0);
							});
						}
					}
					
				});

				};

function deleajax(id){
	
layer.confirm('确定删除该记录,此操作不可逆？', {
  btn: ['坚决要删除','再想想'] //按钮
}, function(){
  	//AJAX提交删除
				$.ajax({
					type:"post",
					url:'<?php echo url('./admin20161108/task/dele','','',true); ?>',
					data:{id:id},
					datatype:'json',
					success:function(data){
						if(data.code==0){
							layer.msg(data.msg,{icon:2});
						}else if(data.code==1){
							layer.msg(data.msg,{icon:1,time:1500},function(){
								history.go(0);
							});
						}
					}
					
				});
}, function(){
	
});
	

}

function searcheck(){
	if ($('input[name=content]').val() == ''){
		layer.msg('请输入搜索内容',{icon:2});
		return false;
	}else{
		return true;
	}
}

function sorting(){
	//AJAX提交
	$.ajax({
		type:"post",
		url:'<?php echo url('./admin20161108/task/sorting','','',true); ?>',
		data:{type:'state'},
		datatype:'json',
		success:function(data){
			if(data.code==0){
				layer.msg(data.msg,{icon:2});
			}else if(data.code==1){
				layer.msg(data.msg,{icon:1,time:1500},function(){
					history.go(0);
				});
			}
		}
		
	});
}

</script>
</html>