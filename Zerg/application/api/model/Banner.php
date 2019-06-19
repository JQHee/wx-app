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

    protected  $hidden = ['delete_time', 'update_time'];

    // 关联函数
    public function items() {
        return $this -> hasMany('BannerItem', 'banner_id', 'id');
    }

    // 如果还有关联 self::with(['items', 'items1']) -> find($id);
    public function items1() {
        return $this -> hasMany('BannerItem', 'banner_id', 'id');
    }

    // 数据库查询方式
    // 1.通过原生sql语句查询 Db::query类
    // 2.Db:table('')
    // 3.ORM模型关联查询
    public  static  function getBannerByID($id) {
        $bannber = self::with(['items', 'items.img']) -> find($id);
        // 隐藏模型字段

        return $bannber;
    }

}