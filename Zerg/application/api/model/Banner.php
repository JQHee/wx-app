<?php
/**
 * Created by PhpStorm.
 * User: hjq
 * Date: 2019/6/19
 * Time: 2:21 PM
 */

namespace app\api\model;


use think\Model;

class Banner extends Model
{

    // 数据库查询方式
    // 1.通过原生sql语句查询 Db::query类
    // 2.Db:table('')
    // 3.ORM模型关联查询
    public  static  function getBannerByID($id) {

        // 通过 Db:table('')查询
    }

}