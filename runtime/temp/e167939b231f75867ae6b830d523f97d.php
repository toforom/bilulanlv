<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\WWW\bilulanlv\public/../application/admin20161108\view\home\index.html";i:1496111978;}*/ ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--360浏览器优先以webkit内核解析-->


    <title>后台主页</title>

	<link href="__PUBLIC__/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="__PUBLIC__/static/admin/css/animate.css" rel="stylesheet">
    <link href="__PUBLIC__/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
    

</head>

<body class="gray-bg">
    
    <div class="wrapper wrapper-content">
        <div class="row">

            	<div class="col-sm-6">
            		<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>博客运营</h5>
                    </div>
                   <div class="ibox">
                    <div class="ibox-content">
                        <h5>累计运行时间 (始于2012-3-5)</h5>
                        <h2><?php echo $timetj['run']; ?><small> 天</small></h2>
                        <div class="progress progress-mini">
                            <div style="width:100%;" class="progress-bar"></div>
                        </div>
                    </div>
               	 </div>
               		 </div>
            	</div>
            	
            	<div class="col-sm-6">
            		<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>光阴似箭</h5>
                    </div>
                   <div class="ibox">
                    <div class="ibox-content">
                        <h5>今年还剩余</h5>
                        <h2><?php echo $timetj['guonian']; ?><small> 天 占比<?php echo round(($timetj['guonian']/365)*100)?>%</small></h2>
                        <div class="progress progress-mini">
                            <div style="width:<?php echo round($timetj['guonian']/365*100,1);?>%;" class="progress-bar progress-bar-danger"></div>
                        </div>
                    </div>
                </div>
                </div>
            	</div>
            
            <div class="col-sm-12">

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>全站统计<small> 最近6个月</small></h5>
                    </div>
                    <div class="ibox-content">
                        
                         <div id="main" style="width:100%;height:400px;"></div>
                        
                    </div>
                </div>

            </div>
 
        </div>
    </div>

    <!-- 全局js -->
    <script src="__PUBLIC__/static/admin/js/jquery.min.js?v=2.1.4"></script>
	<script src="__PUBLIC__/static/admin/js/plugins/echarts/echarts.simple.min.js"></script>
    <script src="__PUBLIC__/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
</body>
<script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据

			option = {
			    tooltip : {
			        trigger: 'axis',
			        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
			            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
			        }
			    },
			    legend: {
			        data:['日志数量(<?php echo $count[0]; ?>)','日志评论(<?php echo $count[1]; ?>)','文章数量(<?php echo $count[2]; ?>)','文章评论(<?php echo $count[3]; ?>)','留言数量(<?php echo $count[4]; ?>)']
			    },
			    grid: {
			        left: '3%',
			        right: '4%',
			        bottom: '3%',
			        containLabel: true
			    },
			    xAxis : [
			        {
			            type : 'category',
			            data : ['<?php echo $month[0]; ?>','<?php echo $month[1]; ?>','<?php echo $month[2]; ?>','<?php echo $month[3]; ?>','<?php echo $month[4]; ?>','<?php echo $month[5]; ?>']
			        }
			    ],
			    yAxis : [
			        {
			            type : 'value'
			        }
			    ],
			    series : [
			        {
			            name:'日志数量(<?php echo $count[0]; ?>)',
			            type:'bar',
			            data:['<?php echo $diary[0]; ?>','<?php echo $diary[1]; ?>','<?php echo $diary[2]; ?>','<?php echo $diary[3]; ?>','<?php echo $diary[4]; ?>','<?php echo $diary[5]; ?>']
			        },
			        {
			            name:'日志评论(<?php echo $count[1]; ?>)',
			            type:'bar',
			            stack: '广告',
			            data:['<?php echo $diaryc[0]; ?>','<?php echo $diaryc[1]; ?>','<?php echo $diaryc[2]; ?>','<?php echo $diaryc[3]; ?>','<?php echo $diaryc[4]; ?>','<?php echo $diaryc[5]; ?>']
			        },
			        {
			            name:'文章数量(<?php echo $count[2]; ?>)',
			            type:'bar',
			            stack: '广告',
			            data:['<?php echo $article[0]; ?>','<?php echo $article[1]; ?>','<?php echo $article[2]; ?>','<?php echo $article[3]; ?>','<?php echo $article[4]; ?>','<?php echo $article[5]; ?>']
			        },
			        {
			            name:'文章评论(<?php echo $count[3]; ?>)',
			            type:'bar',
			            stack: '广告',
			            data:['<?php echo $articlec[0]; ?>','<?php echo $articlec[1]; ?>','<?php echo $articlec[2]; ?>','<?php echo $articlec[3]; ?>','<?php echo $articlec[4]; ?>','<?php echo $articlec[5]; ?>']
			        },
			        {
			            name:'留言数量(<?php echo $count[4]; ?>)',
			            type:'bar',
			            data:['<?php echo $message[0]; ?>','<?php echo $message[1]; ?>','<?php echo $message[2]; ?>','<?php echo $message[3]; ?>','<?php echo $message[4]; ?>','<?php echo $message[5]; ?>'],

			        }
			    ]
			};


        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
        window.onresize = myChart.resize;
    </script>
</html>
