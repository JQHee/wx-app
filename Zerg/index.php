<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-24
 * Time: 15:02
 */
// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');
// 自定义日志目录
define('LOGO_PATH', __DIR__ . '/logo/');

// 加载框架引导文件
require __DIR__ . '/thinkphp/start.php';

// 开启sql日志文件写入
\think\Log::init([
    'type' => 'File',
    'path' => LOGO_PATH,
    'level' => 'sql'
]);