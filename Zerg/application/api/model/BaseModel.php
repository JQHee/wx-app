<?php
/**
 * Created by PhpStorm.
 * User: hjq
 * Date: 2019/6/19
 * Time: 6:33 PM
 */

namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    // 读取器的应用
    public function prefixImgUrl($value, $data) {
        // 读取自定义的配置
        if ($data['from'] == 1) {
            return config('setting.img_prefix').$value;
        } else {
            return $value;
        }
    }

}