<?php
/**
 * Created by PhpStorm.
 * User: hjq
 * Date: 2019/6/19
 * Time: 2:53 PM
 */

namespace app\lib\exception;


use think\Config;
use think\exception\Handle;
use think\Log;

class ExceptionHandler extends  Handle
{

    private $code;
    private $msg;
    private $result;

    public function render(\Exception $e)
    {

        // 1.用户行为异常
        // 2.系统异常

        if ($e instanceof BaseException) {
            // 如果是自定义异常
            $this -> code = $e -> code;
            $this -> msg = $e -> msg;
            $this -> result = $e -> result;

        } else {
            $switch = Config::get('app_debug');
            if ($switch) {
                return parent::render($e);
            } else {
                $this -> code = 500;
                $this -> msg = '服务器内部错误';
                $this -> result = 0;

                // 记录日志
                $this -> recordErrorLog($e);
            }

        }

        $result = [
            'code' => $this -> code,
            'msg'  => $this -> msg,
            'result' => $this -> result
        ];
        return json($result, $this -> code);
    }

    private function recordErrorLog(\Exception $e) {
        Log::init([
            'type' => 'File',
            'path' => LOGO_PATH,
            'level' => 'error'
        ]);
        Log::record($e -> getMessage(), 'error');
    }

}