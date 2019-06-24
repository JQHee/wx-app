<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-24
 * Time: 14:10
 */

namespace app\api\model;


class ProductProperty extends  BaseModel
{
    /**
     * @var array 隐藏指定字段
     */
    protected $hidden = ['id','delete_time','update_time','product_id'];

}