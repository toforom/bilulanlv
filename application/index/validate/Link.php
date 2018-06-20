<?php
namespace app\index\validate;

use think\Validate;

class Link extends Validate
{
    // 验证规则
    protected $rule = [
         ['title', 'require|max:20', '网站名称必须的|用户名不能大于20个字符'],
         ['url', 'require|url|max:50', '网站地址必须的|请输入正确的URL地址，需要带上http://|网站地址不要太长哟'],
         ['logourl', 'url|max:50', '请输入正确的logo图片地址|网站地址不要太长哟'],
         ['content', 'max:500','限制了提交内容最多为250个汉字']
    ];
}