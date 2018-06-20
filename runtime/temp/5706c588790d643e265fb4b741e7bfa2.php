<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/bilulanlv/application/admin20161108/view/articlelist/index.html";i:1496111977;}*/ ?>

 <!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>新闻分类</title>

    <link href="__PUBLIC__/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">

		    <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加文章分类 </h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" method="post" action="<?php echo url('articlelist/add','','',true); ?>" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">要添加的分类名称</label>
                                <div class="col-sm-4">
                                    <input type="text" name="title" class="form-control">
                                    <input type="hidden" value="1" name="type">
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <button class="btn btn-md btn-success" type="button" onclick="articlelistadd()">添加分类</button>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                        </form>
                        
                        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>分类列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>分类名称</th>
                                        <th>添加时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                               <?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <tbody>
                                    <tr>
										<td><?php echo $vo['id']; ?></td>
                                        <td><?php echo $vo['title']; ?></td>
                                        <td><?php echo date("Y-m-d h:i:s",$vo['add_time']); ?></td>
                                        <td><span class="glyphicon glyphicon-trash" id="<?php echo $vo['id']; ?>" onclick="deleajax(this.id)" style="cursor:pointer;"></span></td>
                                    </tr>
                                </tbody>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </table>
                        </div>
      

                    </div>
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
</body>
<script type="text/javascript">
function articlelistadd(id){
	title=$('input[name=title]').val();
	if (title == ''){
		layer.msg('类目名称不能为空',{icon:2});
		return;
	}
		//AJAX提交
				$.ajax({
					type:"post",
					url:'<?php echo url('./admin20161108/articlelist/add','','',true); ?>',
					data:{title:title,type:1},
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


	function deleajax(id){
	
layer.confirm('确定删除该记录,此操作不可逆？', {
  btn: ['坚决要删除','再想想'] //按钮
}, function(){
  	//AJAX提交删除
				$.ajax({
					type:"post",
					url:'<?php echo url('./admin20161108/articlelist/del','','',true); ?>',
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
</script>
</html>
