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
        $bannber = BannerModel::find($id);
        // $bannber = BannerModel::getBannerByID($id);
        if (!$bannber) {
            throw new BannerMissException();
        }
        return json($bannber);

    }
}