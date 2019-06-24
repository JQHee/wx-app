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
use app\api\validate\IDMustBePostiveInt;
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

    /**
     * 获取分类下所属商品
     * @url /product/by_category?id=3
     * @http GET
     * @param $id 分类ID
     * @return false|Collection 返回模型对象
     * @throws ProductException 自定义商品异常
     */
    public function getAllInCategory($id)
    {
        //验证数据
        (new IDMustBePostiveInt())->goCheck();
        //获取模型对象 Collection
        $products = ProductModel::getProductByCategoryID($id);
        //抛出异常
        if($products->isEmpty())
        {
            throw new ProductException();
        }
        //临时隐藏字段summary
        $products = $products->hidden(['summary']);
        return $products;
    }

    /**
     * 获取一个商品 完整数据(商品详情)
     * @url /product/1
     * @http GET
     * @param $id 商品ID
     * @return false|array 商品信息
     * @throws ProductException 自定义商品异常
     */
    public function getOne($id)
    {
        //验证数据
        (new IDMustBePostiveInt())->goCheck();
        //获取商品信息
        $product = ProductModel::getProductDetail($id);
        //抛出异常
        if(!$product)
        {
            throw new ProductException();
        }
        return $product;
    }



}