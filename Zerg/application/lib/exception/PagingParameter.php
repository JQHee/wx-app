<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-24
 * Time: 14:52
 */

namespace app\lib\exception;


use app\api\validate\BaseVlidate;

class PagingParameter extends BaseVlidate
{
    /**
     * @var array 验证字段 => 必填 必须是正整数
     */
    protected $rule =[
        'page' => 'require|isPositiveInteger',
        'size' => 'require|isPositiveInteger',
    ];
    /**
     * @var array 字段 => 验证不通过提示信息
     */
    protected $message =[
        'page' => '分页参数必须是正整数',
        'size' => '分页参数必须是正整数',
    ];
}