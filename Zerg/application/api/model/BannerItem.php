<?php
/**
 * Created by PhpStorm.
 * User: hjq
 * Date: 2019/6/19
 * Time: 5:28 PM
 */

namespace app\api\model;


use think\Model;

class BannerItem extends Model
{

    protected  $hidden = ['delete_time', 'update_time'];

    public function img() {
        return $this -> belongsTo('Image', 'img_id', 'id');
    }

}