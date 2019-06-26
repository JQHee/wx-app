<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-26
 * Time: 10:43
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    //状态码
    public $code = 404;
    //错误信息
    public $msg  = '用户不存在';
}