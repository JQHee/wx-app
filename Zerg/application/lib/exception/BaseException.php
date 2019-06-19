<?php
/**
 * Created by PhpStorm.
 * User: hjq
 * Date: 2019/6/19
 * Time: 2:55 PM
 */

namespace app\lib\exception;



use think\Exception;

class BaseException extends Exception
{
    // HTTP 状态码 400 200
    public $code = 400;

    // 错误具体信息
    public $msg = '参数错误';

    public $result = 0;

    // 构造函数
    public  function __construct($params = [])
    {
        if (!is_array($params)) {
            return;
            // throw  new  Exception('参数必须是数组');
        }
        if (array_key_exists('code', $params)) {
            $this -> code = $params['code'];
        }
        if (array_key_exists('msg', $params)) {
            $this -> msg = $params['msg'];
        }
        if (array_key_exists('result', $params)) {
            $this -> result = $params['result'];
        }
    }

}