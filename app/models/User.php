<?php


namespace app\models;

use think\Model;
use think\model\concern\SoftDelete;

class User extends Model
{
    use SoftDelete;

    // 定义软删除字段名
    protected $deleteTime = 'deleted_at';

    // 定义时间戳字段名
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';

    // 隐藏字段
    protected $hidden = [
        'deleted_at'
    ];

    // 设置字段信息
    protected $schema = [
        'id'          => 'int',
        'nickname'        => 'string',
        'sex'        => 'tinyint',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'deleted_at' => 'timestamp'
    ];

    public $sexMap = [
        0 => '未知',
        1 => '男',
        2 => '女',
    ];
}
