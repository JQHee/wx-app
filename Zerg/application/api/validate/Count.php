<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-24
 * Time: 11:39
 */

namespace app\api\validate;

/**
 * 数量检验
 * Class Count
 * @package app\api\validate
 */
class Count extends BaseVlidate
{
    /**
     * @var array 验证是否为正整数和是否在数值范围
     */
    protected $rule = [
        'count' => 'isPositiveInteger|between:1,15',
    ];
}