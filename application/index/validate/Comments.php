<?php
namespace app\index\validate;

use think\Validate;

class Comments extends Validate
{
    // 验证规则
    protected $rule = [
         ['name', 'max:20', '用户名不能大于20个字符'],
         ['url', 'url', '请输入正确的URL地址，需要带上http://'],
         ['email', 'email', '请输入正确的E-mail地址'],
         ['content'    , 'require|max:500','评论内容必须填写|限制了提交内容最多为250个汉字']
    ];
}