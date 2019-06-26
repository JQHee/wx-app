<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-26
 * Time: 09:40
 */

namespace app\lib\exception;


// 使用自定义的 ExceptionHandler config配置
// 'exception_handle'       => 'app\lib\exception\ExceptionHandler',

class TokenException extends  BaseException
{
    //状态码
    public $code = 401;
    //错误提示信息
    public $msg  = 'Token已经过期或无效Token';
}