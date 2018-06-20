<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"/www/wwwroot/bilulanlv/application/admin20161108/view/xuyu/index.html";i:1496111981;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>碎语</title>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

	<link href="__PUBLIC__/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/animate.css" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body>
    <div class="wrapper wrapper-content  animated fadeInRight">
        <div class="row">
        	<?php if(is_array($xuyu) || $xuyu instanceof \think\Collection): $i = 0; $__LIST__ = $xuyu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="" style="width:50%; margin: 0 auto;">
                <div class="ibox">

                        <ul class="sortable-list connectList agile-list ui-sortable">
                            <li class="<?php echo RandomColor();?>-element">
                                <strong><?php echo $vo['title']; ?></strong>
                                <div>&nbsp;&nbsp;<?php echo $vo['content']; ?></div>
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">标签</a>
                                    <i class="fa fa-clock-o"></i> <?php echo date("Y-m-d H:i:s",$vo['add_time']); ?>
                                </div>
                            </li>
                        </ul>

                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="page" style="width:50%; margin: 0 auto; text-align: center;">
        	<?php echo $xuyu->render(); ?>
		</div>
    </div>

    <!-- 全局js -->
    <script src="__PUBLIC__/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="__PUBLIC__/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="__PUBLIC__/static/admin/js/plugins/layer/layer.min.js"></script>

</body>
<script type="text/javascript">
	var chengyuval = new Array;
	function chengyuajax(){
		//AJAX提交
		$.ajax({
			type:"get",
			url:'<?php echo url('./admin20161108/index/chengyu','','',true); ?>',
			datatype:'json',
			success:function(data){
				chengyuval = data;
				if(data.error_code==0){
					var chengyuname = data.name;
					$("#chengyuname").text(chengyuname);
					var chengyu = data.result.chengyujs;
					$("#chengyu").text(chengyu);
				}else if(data.error_code==215702){
					var chengyuname = data.name;
					$("#chengyuname").text(chengyuname);
					var chengyu = data.reason;
					$("#chengyu").text(chengyu);
				}else{
					layer.msg('获取成语失败',{icon:2,time:1500});
				}
			}
			
		});
		}
	function ChengYu(id,lang){
		console.log(chengyuval);
		if (chengyuval['result'] == null) {
			layer.open({
			  type: 1,
			  title: false,
			  closeBtn: 0,
			  shadeClose: true,
			  skin: 'yourclass',
			  content: '<div style="padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;"><strong style="color:#FF0000">拼音：</strong>null<br><strong style="color:#FF0000">解释：</strong>'+lang+'<br><strong style="color:#FF0000">出自：</strong>null<br><strong style="color:#FF0000">举例：</strong>null<br><strong style="color:#FF0000">词语解释：</strong>null<br><strong style="color:#FF0000">详细解释：</strong>null<br><button id="'+id+'" lang="'+lang+'" type="button" class="btn btn-block btn-success btn-xs" onclick="AddXuYu(this.id,this.lang)">收入絮语</button></div>'
			});
		} else{
			layer.open({
			  type: 1,
			  title: false,
			  closeBtn: 0,
			  shadeClose: true,
			  skin: 'yourclass',
			  content: '<div style="padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;"><strong style="color:#FF0000">拼音：</strong>'+chengyuval['result']['pinyin']+'<br><strong style="color:#FF0000">解释：</strong>'+chengyuval['result']['chengyujs']+'<br><strong style="color:#FF0000">出自：</strong>'+chengyuval['result']['from_']+'<br><strong style="color:#FF0000">举例：</strong>'+chengyuval['result']['example']+'<br><strong style="color:#FF0000">词语解释：</strong>'+chengyuval['result']['ciyujs']+'<br><strong style="color:#FF0000">详细解释：</strong>'+chengyuval['result']['yinzhengjs']+'<br><button id="'+chengyuval['name']+'" lang="'+chengyuval['result']['chengyujs']+'" type="button" class="btn btn-block btn-success btn-xs" onclick="AddXuYu(this.id,this.lang)">收入絮语</button></div>'
			});
		}
		}
	
	function AddXuYu(id,lang){
			//AJAX提交
		$.ajax({
			type:"post",
			url:'<?php echo url('./admin20161108/index/AddXuYu','','',true); ?>',
			datatype:'json',
			data:{title:id,content:lang},
			success:function(data){
				if(data.code==1){
					layer.msg(data.msg,{icon:1,time:1500});
				}else if(data.code==2){
					layer.msg(data.msg,{icon:3,time:1500});
				}else{
					layer.msg(data.msg,{icon:2,time:1500});
				}
			}
			
		});
	}
</script>
</html>
