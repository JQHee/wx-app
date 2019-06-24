<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-24
 * Time: 14:51
 */

namespace app\lib\exception;


use app\api\validate\BaseVlidate;

class TokenGet extends BaseVlidate
{
    protected $rule = [
        'code' => 'require|isNotEmpty',
    ];
    protected $message=[
        'code' => '没有code不能获取Token',
    ];

}