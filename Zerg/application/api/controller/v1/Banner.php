<?php
/**
 * Created by PhpStorm.
 * User: hjq
 * Date: 2019/6/19
 * Time: 1:24 PM
 */

namespace app\api\controller\v1;

use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;

class Banner {

    /**
     * 获取指定id的banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id 为正整数
     **/
    function getBanner($id) {

        (new IDMustBePostiveInt()) ->goCheck();
        // $bannber = BannerModel::with(['items', 'items.img']) -> find($id);
        $bannber = BannerModel::getBannerByID($id);
        /*
        // 隐藏模型字段 (非常糟糕)
        $data = $bannber -> toArray();
        unset($data['delete_time']);
        */
        // $bannber -> hidden(['delete_time']);
        // $bannber -> visible(['id']);
        if (!$bannber) {
            throw new BannerMissException();
        }

        return $bannber;

    }
}