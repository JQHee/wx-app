<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-24
 * Time: 11:13
 */

namespace app\api\model;


class Product extends BaseModel
{
    /**
     * @var array 隐藏指定字段
     */
    protected $hidden =[
        'delete_time', 'main_img_id', 'pivot','from',
        'category_id', 'create_time', 'update_time'
    ];

    // 读取器的应用 (处理null的字段)
    public function getSummaryAttr($value, $data) {
        if ($value) {
            return $value;
        }
        return '';
    }

    /**
     * 获取商品数据
     * @param $count 需要获取的条数
     * @return false|object|collection 商品模型对象
     */
    public static function getMostRecent($count)
    {
        //指定获取条数 并且倒序
        return self::limit($count)->order('create_time desc')->select();
    }
}