<?php
/**
 * Created by PhpStorm.
 * User: midland
 * Date: 2019-06-26
 * Time: 10:38
 */

namespace app\api\validate;



class AddressNew extends  BaseVlidate
{
    /**
     * @var array 验证是否为手机号与是否为空
     */
    protected $rule = [
        'mobile'   => 'require|isMobile',
        'name'     => 'require|isNotEmpty',
        'province' => 'require|isNotEmpty',
        'city'     => 'require|isNotEmpty',
        'country'  => 'require|isNotEmpty',
        'detail'   => 'require|isNotEmpty',
    ];
}