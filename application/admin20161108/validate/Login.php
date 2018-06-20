<?php
namespace app\admin20161108\validate;

use think\Validate;

class Login extends Validate
{
    // 验证规则
    protected $rule = [
         ['username', 'require|min:5|max:10|alphaDash', '管理员用户名必须填写|管理员用户名不能短于5个字符|管理员用户名不能大于10个字符|必须为字母或数字'],
         ['password', 'require|min:5|alphaDash', '密码必须填写|密码不能短于5个字符|必须为字母或数字'],
         ['code'    , 'require|max:5|alphaNum','验证码必须填写|验证码不能大于5个字符|必须为字母或数字'],
         //['phone'    , 'require|length:11','手机号码不能为空|手机号码不符合规定']
    ];
}