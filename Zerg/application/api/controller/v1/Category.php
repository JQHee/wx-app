<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-24
 * Time: 12:31
 */

namespace app\api\controller\v1;
use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;


class Category
{
    /**
     * 获取所有分类
     * @url /category/all
     * @http GET
     * @return false|static[] 需要获取那些ID的数据 []为全部
     * @throws CategoryException 自定义分类异常类
     */
    public function getAllCategories()
    {
        //获取分类模型对象
        $categories = CategoryModel::all([], 'img');
        //抛出异常
        if($categories->isEmpty())
        {
            throw new CategoryException();
        }
        return n_json(200, '请求成功', 1, $categories);
    }
}