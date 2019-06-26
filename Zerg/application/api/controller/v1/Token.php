<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-26
 * Time: 09:14
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token
{

    /**
     * 获取Token
     * @param string $code 客户端码
     * @return array Token令牌
     */
    public function getToken() {

        // 数据验证
        (new TokenGet()) ->goCheck();

        $result = new UserToken();
        $token = $result -> get();
        return n_json(200, '请求成功', 1, ['token' => $token]);
    }
}