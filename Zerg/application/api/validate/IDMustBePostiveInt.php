<?php

/**
 * Created by PhpStorm.
 * User: hjq
 * Date: 2019/6/19
 * Time: 1:47 PM
 */
namespace app\api\validate;

use think\Validate;

class IDMustBePostiveInt extends BaseVlidate
{

    protected $rule = [
        'id' => 'require|isPostiveInteger'
    ];

    // 自定义验证规则
    // id为正整数
    protected function isPostiveInteger($value, $rule='', $data='', $filed='') {
        if(is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        } else {
            // 返回错误信息
            return $filed + '必须是正整数';
        }
    }
}