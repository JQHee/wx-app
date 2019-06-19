<?php
/**
 * Created by PhpStorm.
 * User: hjq
 * Date: 2019/6/19
 * Time: 2:10 PM
 */

namespace app\api\validate;


use app\lib\exception\BaseException;
use app\lib\exception\ParmeterException;
use think\Request;
use think\Validate;

class BaseVlidate extends Validate
{

    public function goCheck() {

        $request = Request::instance();
        $params = $request -> param();

        $result = $this -> check($params);
        if (!$result) {
            $e = new ParmeterException([
                'msg' => $this -> error
            ]);
            throw $e;
        } else {
            return true;
        }
    }
}