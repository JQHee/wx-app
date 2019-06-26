<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-26
 * Time: 09:29
 */

namespace app\lib\exception;


class WeChatException extends  BaseException
{
    //状态码
    public $code  = 400;
    //错误提示信息
    public $msg   = '微信接口调用失败';
    public $result   = 0;
}