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

    //验证字段及验证方法
    protected $rule = [
        'id' => 'require|isPositiveInteger',
    ];

    //验证不通过提示信息
    protected $message = [
        'id' => 'id必须是正整数',
    ];
}