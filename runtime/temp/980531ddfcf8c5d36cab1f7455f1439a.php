<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/www/wwwroot/bilulanlv/application/admin20161108/view/articlechange/index.html";i:1496111976;}*/ ?>
<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>添加文章</title>
		<link rel="shortcut icon" href="favicon.ico">
		<link href="__PUBLIC__/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
		<link href="__PUBLIC__/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">

		<link href="__PUBLIC__/static/admin/css/animate.css" rel="stylesheet">
		<link href="__PUBLIC__/static/admin/css/style.css?v=4.1.0" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/static/admin/wangedit/wangEditor/css/wangEditor.min.css">
		<link href="__PUBLIC__/static/admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

		<style type="text/css">
			#editor-trigger {
				height: 350px;
			}
			
			.container {
				width: 100%;
				margin: 0 auto;
				position: relative;
				padding: 0;
			}
		</style>

	</head>

	<body class="gray-bg">

		<!--带动画效果内容-->
		<div class="wrapper wrapper-content animated fadeInRight">
			<div class="row">
				<div class="col-sm-12">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>添加文章 </h5>
						</div>
						<?php if(is_array($list) || $list instanceof \think\Collection): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<form name="formdiary" method="post" onSubmit="return checkpost();">
						<div class="ibox-content">

							<div class="alert alert-info alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 提示：请按照要求填写内容。
							</div>

							<input type="text" name="title" value="<?php echo $vo['title']; ?>" placeholder="请输入文章标题" class="form-control">
							<br />
							<!--wangedit编辑器-->
							<div id="editor-container" class="container">
								<div id="editor-trigger">
									<?php echo htmlspecialchars_decode($vo['content']); ?>
								</div>
							</div>
							<input type="hidden" value="" name="content" id="content" />
							<br />
							<div class="row">
								<div class="col-xs-4 col-md-4" align="right" style="margin-top: 5px;">
									<div class="checkbox checkbox-success checkbox-inline">
										<input type="radio" id="inlineRadio1" value="1" name="acco" <?php echo !empty($vo['acco']) && $vo['acco']==1?'checked' :''; ?>>
										<label for="inlineRadio1"> 公开 </label>
									</div>
									<div class="checkbox checkbox-warning checkbox-inline">
										<input type="radio" id="inlineRadio2" value="0" name="acco" <?php echo !empty($vo['acco']) && $vo['acco']==1?'' :'checked'; ?>>
										<label for="inlineRadio2"> 隐藏 </label>
									</div>
								</div>
								<div class="col-xs-3  col-md-2">
									<select class="form-control m-b inline" name="n_type">
                                        <option value="">选择类型</option>
                                        <?php if(is_array($lb) || $lb instanceof \think\Collection): $i = 0; $__LIST__ = $lb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lb): $mod = ($i % 2 );++$i;?>
                                        <option <?php echo !empty($lb['title']) && $lb['title']==$vo['n_type']?'selected' :''; ?> value="<?php echo $lb['title']; ?>"><?php echo $lb['title']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
								</div>
								<div class="col-xs-3  col-md-2" align="left">
									<input type="text" name="n_from" value="<?php echo $vo['n_from']; ?>" class="form-control">
								</div>
								<div class="col-xs-2  col-md-4" align="left">
									<input type="hidden" name="id" value="<?php echo $vo['id']; ?>" />
									<button class="btn btn-md btn-success" onclick="chuan()" type="button">修改文章</button>
									<button class="btn btn-md btn-group" onclick="save()" type="button" name="backsave">临时保存</button>
								</div>
							</div>
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- 全局js -->
		<script src="__PUBLIC__/static/admin/js/jquery.min.js?v=2.1.4"></script>
		<script type="text/javascript" src="__PUBLIC__/static/layer/layer.js"></script>
		<script type="text/javascript" src="__PUBLIC__/static/admin/wangedit/wangEditor/js/wangEditor.js"></script>
		<script type="text/javascript" src="__PUBLIC__/static/admin/wangedit/js/plupload/plupload.full.min.js"></script>
		<script type="text/javascript" src="__PUBLIC__/static/admin/wangedit/js/plupload/i18n/zh_CN.js"></script>
		<script type="text/javascript" src="__PUBLIC__/static/admin/wangedit/js/qiniu.js"></script>
		<script type="text/javascript">
			// 封装 console.log 函数
			function printLog(title, info) {
				window.console && console.log(title, info);
			}
			//获取token
			$.getJSON("<?php echo url('backup/uptoken','','',true); ?>", function(json) {
				token = json.uptoken;
			});

			// 初始化七牛上传
			function uploadInit() {
				var editor = this;
				var btnId = editor.customUploadBtnId;
				var containerId = editor.customUploadContainerId;

				// 创建上传对象
				var uploader = Qiniu.uploader({
					runtimes: 'html5,flash,html4', //上传模式,依次退化
					browse_button: btnId, //上传选择的点选按钮，**必需**
					//uptoken_url: 'http://bilulanlv.com/admin.php/backup/uptoken',
					//Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
					uptoken: token,
					//若未指定uptoken_url,则必须指定 uptoken ,uptoken由其他程序生成
					unique_names: true,
					// 默认 false，key为文件名。若开启该选项，SDK会为每个文件自动生成key（文件名）
					// save_key: true,
					// 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK在前端将不对key进行任何处理
					domain: 'http://of12uci2m.bkt.clouddn.com/',
					//bucket 域名，下载资源时用到，**必需**
					container: containerId, //上传区域DOM ID，默认是browser_button的父元素，
					max_file_size: '100mb', //最大文件体积限制
					flash_swf_url: '../js/plupload/Moxie.swf', //引入flash,相对路径
					filters: {
						mime_types: [
							//只允许上传图片文件 （注意，extensions中，逗号后面不要加空格）
							{
								title: "图片文件",
								extensions: "jpg,gif,png,bmp"
							}
						]
					},
					max_retries: 3, //上传失败最大重试次数
					dragdrop: true, //开启可拖曳上传
					drop_element: 'editor-container', //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
					chunk_size: '4mb', //分块上传时，每片的体积
					auto_start: true, //选择文件后自动上传，若关闭需要自己绑定事件触发上传
					init: {
						'FilesAdded': function(up, files) {
							plupload.each(files, function(file) {
								// 文件添加进队列后,处理相关的事情
								printLog('on FilesAdded');
							});
						},
						'BeforeUpload': function(up, file) {
							// 每个文件上传前,处理相关的事情
							printLog('on BeforeUpload');
						},
						'UploadProgress': function(up, file) {
							// 显示进度条
							editor.showUploadProgress(file.percent);
						},
						'FileUploaded': function(up, file, info) {
							// 每个文件上传成功后,处理相关的事情
							// 其中 info 是文件上传成功后，服务端返回的json，形式如
							// {
							//    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
							//    "key": "gogopher.jpg"
							//  }
							printLog(info);
							// 参考http://developer.qiniu.com/docs/v6/api/overview/up/response/simple-response.html

							var domain = up.getOption('domain');
							var res = $.parseJSON(info);
							var sourceLink = domain + res.key; //获取上传成功后的文件的Url

							printLog(sourceLink);

							// 插入图片到editor
							editor.command(null, 'insertHtml', '<img src="' + sourceLink + '" style="max-width:100%;"/>')
						},
						'Error': function(up, err, errTip) {
							//上传出错时,处理相关的事情
							printLog('on Error');
						},
						'UploadComplete': function() {
								//队列文件处理完毕后,处理相关的事情
								printLog('on UploadComplete');

								// 隐藏进度条
								editor.hideUploadProgress();
							}
							// Key 函数如果有需要自行配置，无特殊需要请注释
							//,
							// 'Key': function(up, file) {
							//     // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
							//     // 该配置必须要在 unique_names: false , save_key: false 时才生效
							//     var key = "";
							//     // do something with key here
							//     return key
							// }
					}
				});
				// domain 为七牛空间（bucket)对应的域名，选择某个空间后，可通过"空间设置->基本设置->域名设置"查看获取
				// uploader 为一个plupload对象，继承了所有plupload的方法，参考http://plupload.com/docs
			}

			// 生成编辑器
			var editor = new wangEditor('editor-trigger');
			editor.config.customUpload = true;
			editor.config.customUploadInit = uploadInit;
			editor.create();
			
			//自动缓存编辑器中的内容
			setInterval(function(){
					val = editor.$txt.html();
					if (val.length >30 && val !== localStorage.getItem("日志缓存")){
						localStorage.setItem("日志缓存", val);
						console.log(localStorage.getItem("日志缓存"));
						$('button[name=backsave]').text('缓存中');
					}
					
					},30*1000);
			function save(){
				if(localStorage.getItem("日志缓存").length > 30){
					$('div[id=editor-trigger]').html(localStorage.getItem("日志缓存"));
				}else{
					console.log('当前缓存不可用')
				}
				
			}
			
			function chuan() {
				var text = editor.$txt.formatText();
				if (text == ''){
					layer.msg('内容不能为空',{icon:2});
					return false;
				}else{
					document.getElementById("content").value = editor.$txt.html();
				}
				//AJAX提交
				$.ajax({
					type:"post",
					url:'<?php echo url('./admin20161108/articlechange/edit','','',true); ?>',
					data:$('form[name=formdiary]').serialize(),
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
	</body>

</html>