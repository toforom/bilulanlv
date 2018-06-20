<?php
namespace app\admin20161108\validate;

use think\Validate;

class Taskadd extends Validate
{
    // 验证规则
    protected $rule = [
         ['title', 'require', '任务标题必须填写'],
         ['state', 'require|number', '紧急程度必须填写|必须为数字'],
         ['acco'    , 'require|number','状态必须填写|必须为数字'],
         ['baifen'    , 'number','必须为数字']
    ];
}