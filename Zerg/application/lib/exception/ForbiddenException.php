<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-26
 * Time: 09:49
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    //状态码
    public $code = 403;
    //错误提示信息
    public $msg = '权限等级不够';

    public $result = 0;
}