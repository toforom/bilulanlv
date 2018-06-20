<?php
namespace app\admin20161108\validate;

use think\Validate;

class Setting extends Validate
{
    // 验证规则
    protected $rule = [
         ['today', 'require|number|gt:99', '不填通不过|尼妹的,这里能填除数字以外的东西吗?|小于100,就别丢人了']
    ];
}