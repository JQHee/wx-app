<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/*
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
*/

use think\Route;

// Validate  参数验证层

// 三段式 模块/控制器/方法 'api/:version.Banner/getBanner'
Route::get('api/:version/banner','api/:version.Banner/getBanner');

// 获取首页主题
Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
Route::get('api/:version/themeGoods','api/:version.Theme/getComplexOne');
// 首页顶部商品列表
Route::get('api/:version/homeGoods','api/:version.Product/getRecent');

// 分类列表
Route::get('api/:version/categoryList','api/:version.Category/getAllCategories');