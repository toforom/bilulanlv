<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\WWW\bilulanlv\public/../application/admin20161108\view\xuyu\index.html";i:1497175216;}*/ ?>
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
                                <strong><?php echo $vo['content']; ?></strong>
                                <div>&nbsp;&nbsp;<?php echo $vo['annotation']; ?></div>
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">标签</a>
                                    <i class="fa fa-clock-o"></i> <?php echo date("Y-m-d H:i:s",$vo['create_time']); ?>
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
</html>
