<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"E:\WWW\bilulanlv\public/../application/admin20161108\view\index\index.html";i:1497175114;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>后台主页</title>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

	<link href="__PUBLIC__/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/animate.css" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="__PUBLIC__/static/admin/img/profile_small.jpg" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold">深蓝</strong></span>
                                <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="J_menuItem" href="form_avatar.html">修改头像</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo url('login/loginout','','',true); ?>">安全退出</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo url('./home','','',true); ?>"><i class="fa fa-home"></i> <span class="nav-label">后台主页</span></a>
                        <a href="/" target="_blank"><i class="glyphicon glyphicon-send"></i> <span class="nav-label">前台主页</span></a>
                    </li>
					
					<li>
                        <a class="J_menuItem" href="<?php echo url('./setting','','',true); ?>"><i class="fa fa-gear"></i> <span class="nav-label">系统设置</span></a>
                    </li>
                    <li>
                         <a href="#"><i class="fa fa-file-text"></i> <span class="nav-label">日志管理</span><?php if($diary > 0): ?><span class="label label-danger pull-right"><?php echo $diary; ?></span><?php else: ?><span class="fa arrow"></span><?php endif; ?></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="<?php echo url('./diaryadd','','',true); ?>">添加日志</a>
                            </li>
                            <li><a class="" href="<?php echo url('./diaryadd','','',true); ?>" target="_blank">手机添加</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo url('./diary','','',true); ?>">所有日志</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo url('./diarycomment','','',true); ?>">日志评论</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-book"></i> <span class="nav-label">文章管理 </span><?php if($article > 0): ?><span class="label label-danger pull-right"><?php echo $article; ?></span><?php else: ?><span class="fa arrow"></span><?php endif; ?></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="<?php echo url('./articleadd','','',true); ?>">添加文章</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo url('./articlelist','','',true); ?>">文章分类</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo url('./article','','',true); ?>">所有文章</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo url('./articlecomment','','',true); ?>">文章评论</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-quote-left"></i> <span class="nav-label">絮语管理 </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="<?php echo url('./xuyuadd','','',true); ?>">添加絮语</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo url('./xuyu','','',true); ?>">絮语列表</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-tasks"></i> <span class="nav-label">任务管理 </span><?php if($task > 0): ?><span class="label label-warning pull-right"><?php echo $task; ?></span><?php else: ?><span class="fa arrow"></span><?php endif; ?></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="<?php echo url('./taskadd','','',true); ?>">添加任务</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo url('./task','','',true); ?>">任务列表</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-comments"></i> <span class="nav-label">留言管理 </span><?php if($message > 0): ?><span class="label label-danger pull-right"><?php echo $message; ?></span><?php else: ?><span class="fa arrow"></span><?php endif; ?></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="<?php echo url('./message','','',true); ?>">留言列表</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-image"></i> <span class="nav-label">图片管理 </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="<?php echo url('./imageadd','','',true); ?>">添加图片</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo url('./imagelist','','',true); ?>">图片分类</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo url('./image','','',true); ?>">所有图片</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo url('./imagecomment','','',true); ?>">图片评论</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-link"></i> <span class="nav-label">友链管理 </span><?php if($link > 0): ?><span class="label label-danger pull-right"><?php echo $link; ?></span><?php else: ?><span class="fa arrow"></span><?php endif; ?></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="<?php echo url('./link','','',true); ?>">友链列表</a>
                            </li>
                        </ul>
                    </li>
                    <!--<li>
                        <a href="mailbox.html"><i class="fa fa-upload"></i> <span class="nav-label">更新历程 </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="<?php echo url('./Database/index','type=export'); ?>">添加更新</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo url('./Database/index','type=import'); ?>">更新列表树</a>
                            </li>
                        </ul>
                    </li>-->
                    <li>
                        <a class="J_menuItem" href="<?php echo url('./Log','','',true); ?>"><i class="fa fa-mouse-pointer"></i> <span class="nav-label">操作日志</span></a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo url('./backup','','',true); ?>"><i class="fa fa-database"></i> <span class="nav-label">数据库备份</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header" style="width: 100%;">
                    	<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        	<div class="text-center" style="margin-top:18px; color:red;font-family: '微软雅黑';font-size: 14px;">
                        		<?php if($chengyu == 0): ?>
                        		由于API提供商服务器故障，获取成语失败，请稍候再试。
                        		<?php elseif($chengyu['result'] == ''): ?>
                        		<a name="cya" href="javascript:void(0)" id="<?php echo $chengyu['name']; ?>" onclick="ChengYu(this.id)">【<span id="chengyuname"><?php echo $chengyu['name']; ?></span>】 </a><span id="chengyu" style="cursor: pointer;" onclick="chengyuajax()">暂未收录</span>
                        		<?php else: ?>
                        		<a name="cyb" href="javascript:void(0)" id="<?php echo $chengyu['name']; ?>" lang="<?php echo $chengyu['result']['chengyujs']; ?>" onclick="ChengYu(this.id,this.lang)">【<span id="chengyuname"><?php echo $chengyu['name']; ?></span>】 </a><span id="chengyu" style="cursor: pointer;" onclick="chengyuajax()"><?php echo $chengyu['result']['chengyujs']; ?></span>
                        		<?php endif; ?>
                        	</div>
                   			<div></div>
                    </div>
                </nav>
            </div>
            <div class="row content-tabs">
                <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
                </button>
                <nav class="page-tabs J_menuTabs">
                    <div class="page-tabs-content">
                        <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">首页</a>
                    </div>
                </nav>
                <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
                </button>
                <div class="btn-group roll-nav roll-right">
                    <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                    </button>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li class="J_tabShowActive"><a>定位当前选项卡</a>
                        </li>
                        <li class="divider"></li>
                        <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                        </li>
                        <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                        </li>
                    </ul>
                </div>
                <a href="<?php echo url('login/loginout','','',true); ?>" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo url('./home','','',true); ?>" frameborder="0" data-id="index_v1.html" seamless></iframe>
            </div>
            <div class="footer">
                <div class="pull-right">&copy; 2009-<?php echo date("Y")?> <a href="http://www.bilulanlv.com/" target="_blank">深蓝的博客</a>
                </div>
            </div>
        </div>
        <!--右侧部分结束-->
        <!--右侧边栏开始-->
        <!--右侧边栏结束-->
        
    </div>

    <!-- 全局js -->
    <script src="__PUBLIC__/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="__PUBLIC__/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="__PUBLIC__/static/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="__PUBLIC__/static/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="__PUBLIC__/static/admin/js/plugins/layer/layer.min.js"></script>

    <!-- 自定义js -->
    <script src="__PUBLIC__/static/admin/js/hplus.js?v=4.1.0"></script>
    <script type="text/javascript" src="__PUBLIC__/static/admin/js/contabs.js"></script>

    <!-- 第三方插件 -->
    <script src="__PUBLIC__/static/admin/js/plugins/pace/pace.min.js"></script>

</body>
<script type="text/javascript">
	window.setInterval(chengyuajax, 60000*3); 
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
					$("a[name=cya]").attr("id",chengyuname)
				}else if(data.error_code==215702){
					var chengyuname = data.name;
					$("#chengyuname").text(chengyuname);
					var chengyu = data.reason;
					$("#chengyu").text(chengyu);
					$("a[name=cyb]").attr("id",chengyuname)
					$("a[name=cyb]").attr("lang",chengyu)
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
			  content: '<div style="padding: 30px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;"><strong style="color:#FF0000">拼音：</strong>null<br><strong style="color:#FF0000">解释：</strong>null<br><strong style="color:#FF0000">出自：</strong>null<br><strong style="color:#FF0000">举例：</strong>null<br><strong style="color:#FF0000">词语解释：</strong>null<br><strong style="color:#FF0000">详细解释：</strong>null<br><button id="'+id+'" lang="'+lang+'" type="button" class="btn btn-block btn-success btn-xs" onclick="AddXuYu(this.id)">收入絮语</button></div>'
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
			data:{content:id,annotation:lang,type_id:1},
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
