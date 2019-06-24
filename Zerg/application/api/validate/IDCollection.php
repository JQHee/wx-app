<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-24
 * Time: 11:11
 */

namespace app\api\validate;


class IDCollection extends BaseVlidate
{
    //验证字段及验证方法
    protected $rule = [
        'ids' => 'require|checkIDs',
    ];
    //验证不通过提示信息
    protected $message =[
        'ids' => 'ids参数必须是以逗号分隔的多个正整数',
    ];
    /**
     * 验证数据格式
     * @param $value 用户请求的数据
     * @return bool True OR False
     */
    protected function checkIDs($value)
    {
        //截取数据为数组
        $values = explode(',', $value);
        //验证是否为空
        if(empty($values))
        {
            return false;
        }
        //验证是否是正整数
        foreach($values as $id)
        {
            if(!$this->isPositiveInteger($id))
            {
                return false;
            }
        }
        return true;
    }
}