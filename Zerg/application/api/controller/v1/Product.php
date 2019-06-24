<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-24
 * Time: 11:45
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\lib\exception\ProductException;

class Product
{
    /**
     * 手页底部的商品列表
     * @url /product/recent?count=15
     * @http GET
     * @param int $count 获取商品条数
     * @return object 一组模型对象
     * @throws ProductException 商品自定义异常
     */
    public function getRecent($count=15)
    {
        //验证数据
        (new Count())->goCheck();
        //获取模型对象 Collection
        $products = ProductModel::getMostRecent($count);
        //抛出异常
        if($products->isEmpty())
        {
            throw new ProductException();
        }
        //临时隐藏字段summary
        $products = $products->hidden(['summary']);
        return $products;
    }
}