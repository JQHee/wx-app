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


    /**
     * 验证是否为正整数
     * @param $value 用户提交的数据
     * @param string $rule
     * @param string $data
     * @param string $field 验证的字段
     * @return bool false OR true
     */
    protected function isPositiveInteger($value, $rule='', $data='', $field='')
    {
        if(is_numeric($value) && is_int($value + 0) && ($value + 0) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}