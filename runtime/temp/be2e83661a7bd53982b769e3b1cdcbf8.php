<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"/www/wwwroot/bilulanlv/application/index/view/jump/index.html";i:1496057706;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>站外链接跳转中</title>
    
<style type="text/css">
body {
	font-family: "微软雅黑";
	font-size: 14px;
	color: #444
}

div {
	display: block
}

#go_notifier {
	text-align: center
	
}

#go_notifier .title {
	margin-top: 35%;
	font-size: 24px
}

#go_notifier .main-img {
	margin: 30px 0
}

#go_notifier .sub {
	font-size: 16px;
	color: #999;
	margin-bottom: 100px
}

#go_notifier .sub #time {
	color: #dd3a3e;
	padding-right: 5px
}

.wrapper {
	width: 992px;
	position: relative;
	margin: 0 auto;
	border: 0
}

.btn {
	-moz-user-select: none;
	background: linear-gradient(#fafafa,#f2f2f2) repeat scroll 0 0 rgba(0,0,0,0);
	border: 1px solid #d9d9d9;
	box-shadow: 0 1px 0 #fff inset,0 1px 0 rgba(255,255,255,.3);
	color: #444;
	cursor: pointer;
	display: inline-block;
	text-align: center;
	text-decoration: none;
	text-shadow: 0 1px 0 rgba(255,255,255,.5);
	white-space: nowrap
}

.btnPlus {
            margin-top: 24px;
            display: inline-block;
            white-space: nowrap;
            cursor: pointer;
            background: #444;
            letter-spacing: 1px;
            font-size: 14px;
            -moz-user-select: -moz-none;
            -webkit-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
            text-shadow: none;
            border: 1px solid #ccc;
            line-height: 36px;
            text-align: center;
            height: 36px;
            padding: 0 25px;
            border-radius: 16px;
            -webkit-transition-duration: 400ms;
            transition-duration: 400ms;
            background-color: #fff;
            color: #999;
}

        .btnPlus:hover{
            color: #F77B83;
            border-color: #F77B83;
            outline-style: none;
}          
     .spinner {
            position: absolute;
            top:50%;
            left: 50%;
            z-index: 11;
            margin-top: -6px;
            margin-left: -60px;;
            width: 120px;
            
        }
        .spinner > div {
            width: 12px;
            height: 12px;
            background-color: #67CF22;
            border-radius: 100%;
            display: inline-block;
            animation: bouncedelay 2.8s infinite ease-in-out;
            /* Prevent first frame from flickering when animation starts */
            animation-fill-mode: both;
        }
        .spinner .bounce1 {
            background-color:#cd402e;
        }
        .spinner .bounce2 {
            animation-delay: -0.16s;
            background-color:#b07da8;

        }
        .spinner .bounce3 {
            animation-delay: -0.32s;
            background-color:#f1b428  ;
        }
        .spinner .bounce4 {
            animation-delay: -0.48s;
            background-color:#95c0ea;
        }
        .spinner .bounce5 {
            animation-delay: -0.64s;
            background-color:#46b646;
        }
        @keyframes bouncedelay {
            0%{
                transform: translate(-400px,0);
                opacity: 0;
            }
            35% ,65% {
                transform: translate(0,0);
                opacity: 1;
              }
            100% {
                transform: translate(400px,0);
                opacity: 0;
            }
        }
        

        
</style>
</head>
<body>
<div id="go_notifier">
    <div class="wrapper">
        <div class="title">正在为您跳转到站外链接</div>   
        <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
        <div class="bounce4"></div>
        <div class="bounce5"></div>
        </div>
        <div class="sub">
            <span id="time">3</span><span id="cstr">秒后自动跳转</span>
        </div>
        <a href="<?php echo $url; ?>" class="btn btnPlus"><span class="text"> 立刻前往</span></a>
    </div>
</div>
<script type="text/javascript">
<!--
    function toURL(url)
    {
        var delay = document.getElementById("time").innerHTML;
        if(delay > 0) {
            delay--;
            document.getElementById("time").innerHTML = delay;
        } else {
            document.getElementById("time").style.display="none";
            document.getElementById("cstr").innerHTML = "正在跳转中...<p>所花时间取决于该站的连接速度和当前网速，请耐心等待！或直接点击下面的按钮。</p>";
            location.href = url;
            return;
        }
        setTimeout("toURL('" + url + "')", 1000);
	}

    toURL("<?php echo $url; ?>");
//-->
</script>



</body></html>