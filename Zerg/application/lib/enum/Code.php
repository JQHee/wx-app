<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-26
 * Time: 10:11
 */
namespace app\lib\enum;

class Code {

    // 请求成功
    const Success = 200;
    // 服务器内部错误
    const SeriveError = 500;
    // 接口需要登录
    const NeedToken = 400;
    // Token过期
    const TokenExpired = 401;
}