<?php
/**
 * Created by PhpStorm.
 * User: hjq
 * Date: 2019/6/19
 * Time: 3:00 PM
 */

namespace app\lib\exception;


class BannerMissException extends  BaseException
{

    // HTTP 状态码 400 200
    public $code = 400;

    // 错误具体信息
    public $msg = '暂无数据';

    public $result = 0;
}