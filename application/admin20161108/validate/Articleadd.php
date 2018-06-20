<?php
namespace app\admin20161108\validate;

use think\Validate;

class Articleadd extends Validate
{
    // 验证规则
    protected $rule = [
         ['title', 'require|max:100', '标题必须填写|标题不能大于100个字符'],
         ['content', 'require', '内容必须填写'],
         ['n_type'    , 'require','类型必须填写'],
         ['acco'    , 'require','状态必须填写']
    ];
}