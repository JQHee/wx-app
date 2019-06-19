<?php
/**
 * Created by PhpStorm.
 * User: hjq
 * Date: 2019/6/19
 * Time: 5:43 PM
 */

namespace app\api\model;


use think\Model;

class Image extends BaseModel
{

    protected  $hidden = ['delete_time', 'update_time'];


    // 读取器的应用
    public function getUrlAttr($value, $data) {
        return $this -> prefixImgUrl($value, $data);
    }

}