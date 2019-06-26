<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-26
 * Time: 09:40
 */

namespace app\lib\exception;


class TokenException extends  BaseException
{
    //状态码
    public $code = 401;
    //错误提示信息
    public $msg  = 'Token已经过期或无效Token';
}