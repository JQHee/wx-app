<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-24
 * Time: 12:42
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    // HTTP 状态码 400 200
    public $code = 400;

    // 错误具体信息
    public $msg = '暂无数据';

    public $result = 0;
}