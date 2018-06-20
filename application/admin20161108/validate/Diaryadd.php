<?php
namespace app\admin20161108\validate;

use think\Validate;

class Diaryadd extends Validate
{
    // 验证规则
    protected $rule = [
         ['title', 'require|max:100', '标题必须填写|标题不能大于100个字符'],
         ['content', 'require', '内容必须填写'],
         ['acco'    , 'require|max:1|number','状态必须填写|验证码不能大于1个字符|必须为数字']
    ];
}