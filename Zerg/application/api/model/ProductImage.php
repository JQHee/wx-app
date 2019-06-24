<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-24
 * Time: 14:09
 */

namespace app\api\model;


class ProductImage extends  BaseModel
{
    /**
     * @var array 隐藏指定字段
     */
    protected $hidden = ['img_id','delete_time','product_id'];
    /**
     * 关联模型 获取图片路径
     * @return object 图片模型对象
     */
    public function imgUrl()
    {
        return $this->belongsTo('Image','img_id','id');
    }
}