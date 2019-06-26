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

/* 组的实现
//商品组
Route::group('/product',function()
{
    //获取某个商品详细信息
    Route::get('/:id','api/:version.Product/getOne',[],['id'=>'\d+']);
    //获取分类下商品
    Route::get('/by_category','api/:version.Product/getAllInCategory');
    //获取商品信息
    Route::get('/recent','api/:version.Product/getRecent');
});
*/

// 三段式 模块/控制器/方法 'api/:version.Banner/getBanner'
Route::get('api/:version/banner','api/:version.Banner/getBanner');

// 获取首页主题
Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
Route::get('api/:version/themeGoods','api/:version.Theme/getComplexOne');
// 首页顶部商品列表
Route::get('api/:version/homeGoods','api/:version.Product/getRecent');

// 商品详情
Route::get('api/:version/goodDetail','api/:version.Product/getOne');

// 分类列表
Route::get('api/:version/categoryList','api/:version.Category/getAllCategories');
// 分类下的商品列表
Route::get('api/:version/categorySub','api/:version.Product/getAllInCategory');
