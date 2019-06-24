<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-24
 * Time: 11:11
 */

namespace app\api\model;


class Theme extends BaseModel
{

    /**
     * @var array 隐藏指定字段
     */
    protected $hidden = ['delete_time','update_time','topic_img_id','head_img_id'];
    /**
     * 关联模型 获取主题图片
     * @return object 关联模型对象
     */
    public function topicImg()
    {
        return $this->belongsTo('Image','topic_img_id','id');
    }
    /**
     * 关联模型 获取主题内头部图片
     * @return object 关联模型对象
     */
    public function headImg()
    {
        return $this->belongsTo('Image','head_img_id','id');
    }

    /**
     * 获取主题下所属商品
     * @return object 商品模型关联对象
     */
    public function products()
    {
        return $this->belongsToMany('Product','theme_product','product_id','theme_id');
    }

    /**
     * 获取指定主题数据
     * @param $ids 需要获取的主题ID
     * @return false | object 关联模型对象
     */
    public static function getThemeByIds($ids)
    {
        return self::with(['topicImg','headImg'])->select($ids);
    }

    /**
     * 获取主题及所属商品
     * @param $id 主题ID
     * @return false|array 获取主题商品
     */
    public static function getThemeWithProduct($id)
    {
        return self::with(['products','topicImg','headImg'])->find($id);
    }
}