<?php

declare(strict_types=1);

namespace app\validate;

use think\Validate;

class UserValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'nickname'  =>  'require|min:5|max:25',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message  =   [
        // 'nickname.require' => '必须',
        // 'nickname.max'     => '最多不能超过25个字符',
    ];
}
