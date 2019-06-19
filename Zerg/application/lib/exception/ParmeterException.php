<?php
/**
 * Created by PhpStorm.
 * User: hjq
 * Date: 2019/6/19
 * Time: 4:05 PM
 */

namespace app\lib\exception;

/**
 * 参数错误
 **/
class ParmeterException extends BaseException
{
    // HTTP 状态码 400 200
    public $code = 400;

    // 错误具体信息
    public $msg = '参数错误';

    public $result = 0;



}