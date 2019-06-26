<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-26
 * Time: 09:27
 */

namespace app\api\model;


class User extends  BaseModel
{

    /**
     * 获取用户数据
     * @param $openID 用户ID
     * @return false|array 用户信息
     */
    static function getByOpenID($openID) {
        //获取一条用户信息
        return self::where('openid', '=', $openID)->find();
    }
}