<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
// 自定义日志目录
define('LOGO_PATH', __DIR__ . '/../logo/');

// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';

// 开启sql日志文件写入
\think\Log::init([
    'type' => 'File',
    'path' => LOGO_PATH,
    'level' => 'sql'
]);
