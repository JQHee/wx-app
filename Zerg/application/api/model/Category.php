<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-24
 * Time: 12:42
 */

namespace app\api\model;


class Category extends BaseModel
{
    /**
     * @var array 指定隐藏的字段
     */
    protected $hidden =[
        'update_time','delete_time','create_time'
    ];
    /**
     * 关联Image模型 获得分类图片
     * @return object 关联Image模型对象
     */
    public function img()
    {
        return $this->belongsTo('Image','topic_img_id','id');
    }
}