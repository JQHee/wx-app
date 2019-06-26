<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-26
 * Time: 09:15
 */

namespace app\api\validate;


class TokenGet extends  BaseVlidate
{
    protected $rule = [
        'code' => 'require|isNotEmpty',
    ];
    protected $message=[
        'code' => '没有code不能获取Token',
    ];
}