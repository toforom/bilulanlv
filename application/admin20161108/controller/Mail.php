<?php
namespace app\admin20161108\controller;
use think\Controller;
use think\Db;
use app\admin20161108\model\Log as LogModel;
use app\admin20161108\model\Setting as SettingModel;
use extend\Mail\PHPMailer;

class Mail extends controller
{
    public function index()
    {
    	return $this->fetch();
    }
	
	public function sendmail($type,$mailval){
		//dump($mailval);
		$configmail = new SettingModel;
		$val = $configmail -> listmail('SendMail');
		//dump($val);die;
		$mail = new PHPMailer();
		$mail->IsSMTP(); // 使用SMTP方式发送
		$mail->CharSet='UTF-8';// 设置邮件的字符编码
		$mail->Host = 'smtp.163.com'; // 您的企业邮局服务器
		$mail->Port = 25; // 设置端口
		$mail->SMTPAuth = true; // 启用SMTP验证功能
		$mail->Username = $val[0]['value']; // 邮局用户名(请填写完整的email地址)
		$mail->Password = $val[1]['value']; // 邮局密码
		$mail->From = $val[0]['value']; //邮件发送者email地址
		$mail->FromName = $val[2]['value']; //发件人姓名
		$mail->AddAddress($mailval['email'], $mailval['name']);//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
		$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
		$mail->Subject = $val[3]['value'];//"PHPMailer测试邮件"; //邮件标题
		//1为日志,2为文章,3为留言
		switch ($mailval['type'])
		{
		case 1:
			$body = '<div style="margin: 16px 40px; background-color: #eef2fa; border: 1px solid #d8e3e8; padding: 0 15px;  -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px; border-radius:5px;">
					<p>'.$mailval['name'].'：您在【深蓝的博客】絮语 <a target="_blank" href="http://www.bilulanlv.com/diary/'.$mailval['idd'].'.html#comment">'.$mailval['title'].'</a>&nbsp;中有了新的回复</p>
					<p><strong>'.$mailval['rename'].'</strong>&nbsp;回复说：'.$mailval['recontent'].'</p>
					<p>您的评论：'.$mailval['content'].'</p>
					<p>时间：'.date("Y-m-d H:i:s").'</p>
					<p>本邮件为深蓝的博客自动发送，请勿直接回复，如有疑问，<a href="mailto:'.$val[0]['value'].'" target="_blank">联系我</a> 。</p>
				</div>';
			break;
		case 2:
			$body = '<div style="margin: 16px 40px; background-color: #eef2fa; border: 1px solid #d8e3e8; padding: 0 15px;  -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px; border-radius:5px;">
					<p>'.$mailval['name'].'：您在【深蓝的博客】文章 <a target="_blank" href="http://www.bilulanlv.com/article/'.$mailval['idd'].'.html#comment">'.$mailval['title'].'</a>&nbsp;中有了新的回复</p>
					<p><strong>'.$mailval['rename'].'</strong>&nbsp;回复说：'.$mailval['recontent'].'</p>
					<p>您的评论：'.$mailval['content'].'</p>
					<p>时间：'.date("Y-m-d H:i:s").'</p>
					<p>本邮件为深蓝的博客自动发送，请勿直接回复，如有疑问，<a href="mailto:'.$val[0]['value'].'" target="_blank">联系我</a> 。</p>
				</div>';
			break;
		case 3:
			$body = '<div style="margin: 16px 40px; background-color: #eef2fa; border: 1px solid #d8e3e8; padding: 0 15px;  -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px; border-radius:5px;">
					<p>'.$mailval['name'].'：您在【深蓝的博客】 <a target="_blank" href="http://www.bilulanlv.com/message.html">留言板</a>&nbsp;中有了新的回复</p>
					<p><strong>'.$val[2]['value'].'</strong>&nbsp;回复说：'.$mailval['re_content'].'</p>
					<p>您的留言：'.$mailval['content'].'</p>
					<p>时间：'.date("Y-m-d H:i:s").'</p>
					<p>本邮件为【深蓝的博客】自动发送，请勿直接回复，如有疑问，<a href="mailto:'.$val[0]['value'].'" target="_blank">联系我</a> 。</p>
				</div>';
		};
		//echo $body;die;
		//echo $body;die;
		$mail->Body = $body; //邮件内容
		if(!$mail->Send())
		{
			//写入错误Log
			$data['state'] = 0;
			$data['type']  = $type;
			$data['title'] = '回复自动发送邮件给【'.$mailval['email'].'】【'.$mailval['name'].'】失败';
			$data['add_time']= time();
			$result = new LogModel;
			$result -> add($data);
			echo "邮件发送失败. <p>";
			echo "错误原因: " . $mail->ErrorInfo;
		}else{
			//写入成功Log
			$data['state'] = 1;
			$data['type']  = $type;
			$data['title'] = '回复自动发送邮件给【'.$mailval['email'].'】【'.$mailval['name'].'】成功';
			$data['add_time']= time();
			$result = new LogModel;
			$result -> add($data);
		}
	}
}
